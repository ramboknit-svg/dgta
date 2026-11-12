<?php

namespace App\Http\Controllers\Website\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Hod;
use App\Models\News;
use App\Models\Place;
use App\Models\Application;
use App\Models\Knowledge;
use App\Models\WhatsNew;
use App\Models\Moview;
use App\Models\ContactUs;
use App\Models\HitCount;
use Illuminate\Support\Facades\Storage;
use setasign\Fpdi\Tcpdf\Fpdi;
use App\Models\KnowledgeCategory;
use App\Models\Resource;
use App\Models\ResourcePdf;
use App\Models\TelDir;
use App\Models\Gate;
use App\Models\GatePdf;
use App\Models\Branch;
use App\Models\User;
use Validator;
use Carbon\Carbon;



class HomeController extends Controller
{
    public function homePage(Request $request){
       
        
        $currentDate = now()->toDateString();
          
        $ipAddress = $request->ip();
       
       $this->hitCount($ipAddress,$currentDate);
        //home carousal
        $banners = Banner::where('status',1)->get();
        $hod = Hod::where('status',1)->first();
        $knowledge = Knowledge::where('status',1)->first();
        $news = News::where('status',1)->get();
        $places = Place::where('status',1)->get();
        $applications = Application::where('status',1)->get();
       $WhatsNew = WhatsNew::where('status', 1)->orderBy('id', 'desc')->get();
        $movie = Moview::where('status',1)->orderBy('id', 'desc')->first();
        
        $show = Moview::where('status',1)->orderBy('id', 'desc')->get();
        
         

        return view('website.home.index',compact('banners','hod','news','places','applications','knowledge','WhatsNew','movie','show'));
    }
      public function fp()
    {
          $WhatsNew = WhatsNew::where('status',1)->get();
        return view('website.cell.fp',compact('WhatsNew'));
    }
     public function exam()
    {
         $WhatsNew = WhatsNew::where('status',1)->get();
        return view('website.cell.exam_test',compact('WhatsNew'));
    }

    public function hod(){
     $banners = Banner::where('status',1)->get();
      $hod = Hod::where('status',1)->first();

        return view('website.hod.index',compact('banners','hod'));
    }
    public function cosco(){
        $banners = Banner::where('status',1)->get();
        $hod = Hod::first();
       
        return view('website.cosco.index',compact('banners','hod'));
    }

    public function contactUs(){
       

        return view('website.contact.index');
    }
    ///working code/////////
    // public function contactSubmit(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //          'name'        => 'required|string|max:255',
    // 'email'       => 'required|email',
    // 'phone_number'=> 'required',
    // 'user_type'   => 'required|in:officer,JCO',
    // 'department'  => 'required',
    // 'message'     => 'required',
            
    //     ]);
        
        
    //     if ($validator->fails()) {
    //         return redirect('contact_us')->withErrors($validator)->withInput();
    //     }
        
    //     try {
    //         $contacts = Contactus::create($request->all());
    //         return redirect()->back()->with('success', 'Thanks for your message! We will get back to you soon!');
    //     } catch (\Exception $e) {
    //         return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
    //     }
    // }
    ///////testing code//////
    public function contactSubmit(Request $request)
{
    $request->validate([
        'user_type' => 'required',
        'department' => 'required',
        'name' => 'required',
        'email' => 'required|email',
        'phone_number' => 'required',
        'subject' => 'required',
        'rating' => 'required',
        'pdf_file' => 'required|mimes:pdf',
        'message' => 'required',
        
    ]);

    // Get old submissions (if any)
    $old = session()->get('submissions', []);

    // Add new submission at the START of the array
    array_unshift($old, [
        'name'       => $request->name,
        'department' => $request->department,
        'message'    => $request->message,
        'rating'     => $request->rating,
       
    ]);

    // Save back to session
    session()->put('submissions', $old);

    return back()->with('success', 'Form submitted successfully!');
}


    ////
   
    public function org()
{
   
    $users = User::where('status', 1)
        ->whereNotIn('type', [1,5])
        ->orderBy('id', 'asc')
        ->get();

    $usersById = $users->keyBy('id');

    $orgChart = $this->buildOrgChart($usersById);
    
    return view('website.tell.org', compact('orgChart'));
}
// Recursive function to build the org chart
private function buildOrgChart($users, $parentId = null)
{
    $orgChart = [];
     
    foreach ($users as $user) {
        if ($user->reporting == $parentId) {
            $userData = [
                'id' => $user->id,
                'name' => $user->name,
                'designation' => $user->designation,
                'profile_image' => asset($user->profile_image), // Dynamic profile image
                'children' => $this->buildOrgChart($users, $user->id) // Recursively find their direct reports
            ];
            $orgChart[] = $userData;
        }
    }

    return $orgChart;
} 
     public function notFound()
    {
    
        return view('website.tell.not_found');
    }

     public function tell()
    {
    
        // return all results (no search, no pagination)
        $telDirs = \App\Models\TelDir::orderBy('id', 'asc')->get();
       

        return view('website.tell.telephone', compact('telDirs'));
    } 
     public function resource()
    {
    
         $categories = Resource::whereNull('category_id')
            ->with('children')
            ->get();
        return view('website.resource.index',compact('categories'));
    }
    public function notesResourceByCategory($categoryId)
    {
        
        $notes = ResourcePdf::where('resource_id', $categoryId)
            ->orderByDesc('created_at')
            ->get(['id', 'name', 'link', 'created_at']);
      
       
        return response()->json([
            'ok' => true,
            'data' => $notes
        ]);
    }

     public function downloadResourcePdf(Request $request, $id)
{
    
    $localTime = Carbon::now(); // local time from Laravel timezone

    // example
   
    $new = ResourcePdf::findOrFail($id);


   
    $filePath = base_path(ltrim($new->link, '/'));
  
    if (!file_exists($filePath)) {
        
        abort(404, 'File not found.');
    }
  
$date = $localTime->format('Y-m-d H:i:s');


// ✅ Get user IP address
$ipAddress = $request->ip();

// ✅ Final watermark text (date on top, IP below)
$watermarkText = "{$date}" . PHP_EOL . "{$ipAddress}";

$outputPath = storage_path('app/public/watermarked_' . time() . '.pdf');

$this->addWatermark($filePath, $outputPath, $watermarkText);

return response()->file($outputPath, [
    'Content-Type' => 'application/pdf',
    'Content-Disposition' => 'inline; filename="watermarked.pdf"'
])->deleteFileAfterSend(true);

}
     public function study()
    {
    
        return view('website.tell.study');
    } 
    public function gate()
    {
    
        $categories = Gate::whereNull('category_id')
            ->with('children')
            ->get();
        return view('website.gate.index',compact('categories'));
    }
    public function notesGateByCategory($categoryId)
    {
        
        $notes = GatePdf::where('gate_id', $categoryId)
            ->orderByDesc('created_at')
            ->get(['id', 'name', 'link', 'created_at']);
      
       
        return response()->json([
            'ok' => true,
            'data' => $notes
        ]);
    }

     public function downloadGatePdf(Request $request, $id)
{
    $localTime = Carbon::now(); // local time from Laravel timezone

    // example
   
    $new = GatePdf::findOrFail($id);


   
    $filePath = base_path(ltrim($new->link, '/'));
  
    if (!file_exists($filePath)) {
        
        abort(404, 'File not found.');
    }
  
$date = $localTime->format('Y-m-d H:i:s');


// ✅ Get user IP address
$ipAddress = $request->ip();

// ✅ Final watermark text (date on top, IP below)
$watermarkText = "{$date}" . PHP_EOL . "{$ipAddress}";

$outputPath = storage_path('app/public/watermarked_' . time() . '.pdf');

$this->addWatermark($filePath, $outputPath, $watermarkText);

return response()->file($outputPath, [
    'Content-Type' => 'application/pdf',
    'Content-Disposition' => 'inline; filename="watermarked.pdf"'
])->deleteFileAfterSend(true);

}
    public function stn()
    {
    
        return view('website.tell.stn');
    } 
    
    
    public function branch($slug)
    {    $branch = Branch::where('slug',$slug)->first();
        return view('website.branch.index',compact('branch'));
    }
     public function goc()
    {
    
        return view('website.branch.goc');
    }
     public function gs()
    {
    
        return view('website.branch.gs');
    }
     public function cos()
    {
    
        return view('website.branch.cos');
    }
     public function adm()
    {
    
        return view('website.branch.adm');
    }
     public function doc()
    {
    
        return view('website.branch.doc');
    }
     public function trg_a()
    {
    
        return view('website.branch.trg_a');
    }
     public function trg_b()
    {
    
        return view('website.branch.trg_b');
    }
     public function apvl()
    {
    
        return view('website.branch.apvl');
    }

    //// for call and infosis bulletin
    public function callBulletin()
    {
   
        return view('website.bulletin.call_bulletin');
    }
     public function infosisBulletin()
    {
   
        return view('website.bulletin.infosis_bulletin');
    }
   

public function downloadWhatsNew(Request $request, $id)
{
    $new = WhatsNew::findOrFail($id);

    $filePath = base_path(ltrim($new->image, '/'));

    if (!file_exists($filePath)) {
        abort(404, 'File not found.');
    }

    // ✅ Local time from browser (already local)
    // ✅ Local time from browser (already local)
   // $localTime = $request->input('local_time');

//$date = $request->input('local_time');

  date_default_timezone_set("Asia/Kolkata");
 
    // $dt = date("d-m-Y H:i:s");
    $date = date("d-m-Y H:i:s");
// ✅ Get user IP address
// ✅ Get user IP address
$ipAddress = $request->ip();

// ✅ Final watermark text (date on top, IP below)
$watermarkText = "{$date}" . PHP_EOL . "{$ipAddress}";

$outputPath = storage_path('app/public/watermarked_' . time() . '.pdf');

$this->addWatermark($filePath, $outputPath, $watermarkText);

return response()->file($outputPath, [
    'Content-Type' => 'application/pdf',
    'Content-Disposition' => 'inline; filename="watermarked.pdf"'
])->deleteFileAfterSend(true);

}
public function downloadNews(Request $request, $id)
{
    $new = News::findOrFail($id);

    $filePath = base_path(ltrim($new->pdf, '/'));

    if (!file_exists($filePath)) {
        abort(404, 'File not found.');
    }
    date_default_timezone_set("Asia/Kolkata");
 
    // $dt = date("d-m-Y H:i:s");
    $date = date("d-m-Y H:i:s");
// ✅ Get user IP address
$ipAddress = $request->ip();

// ✅ Final watermark text (date on top, IP below)
$watermarkText = "{$date}" . PHP_EOL . "{$ipAddress}";

$outputPath = storage_path('app/public/watermarked_' . time() . '.pdf');

$this->addWatermark($filePath, $outputPath, $watermarkText);
    return response()->file($outputPath, [
    'Content-Type' => 'application/pdf',
    'Content-Disposition' => 'inline; filename="watermarked.pdf"'
])->deleteFileAfterSend(true);

}
private function addWatermark($source, $output, $text = '')
{
    $pdf = new Fpdi(); // (TCPDF-FPDI)
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);

    $pageCount = $pdf->setSourceFile($source);
     date_default_timezone_set("Asia/Kolkata");
 
    $dt = date("d-m-Y H:i:s");
    $ip = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';

    // ✅ Match uploaded PDF: only IP + DateTime (2 lines)
    $wm = $ip . "\n" . $dt;

    // If you ALSO want 3 lines (text + ip + dt), use this instead:
    // $wm = trim($text) . "\n" . $ip . "\n" . $dt;

    for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {

        $tpl  = $pdf->importPage($pageNo);
        $size = $pdf->getTemplateSize($tpl);

        $pdf->AddPage($size['orientation'], [$size['width'], $size['height']]);

        // 1) Original page
        $pdf->useTemplate($tpl, 0, 0, $size['width'], $size['height'], true);

        // 2) Watermark (single diagonal, light, centered)
        $pdf->SetAlpha(0.15);               // light like sample (tune 0.08–0.18)
        $pdf->SetFont('helvetica', 'B', 50);
        $pdf->SetTextColor(255, 0, 0);      // light red with alpha

        $cx = $size['width'] / 2;
        $cy = $size['height'] / 2;

        $angle  = 55;                       // close to your uploaded PDF
        $blockW = $size['width'] * 0.90;    // keep block compact like sample
        $blockH = 22;                       // 2 lines height (increase if you use 3 lines)

        $x = $cx - ($blockW / 2);
        $y = $cy - ($blockH / 2);

        $pdf->StartTransform();
        $pdf->Rotate($angle, $cx, $cy);

        $pdf->SetXY($x, $y);
        $pdf->MultiCell($blockW, 0, $wm, 0, 'C', false, 1, '', '', true);

        $pdf->StopTransform();

        $pdf->SetAlpha(1); // reset
    }

    $pdf->Output($output, 'F');
    return true;
}


 
    // 🔹 Helper method to add watermark
// private function addWatermark($source, $output, $text)
// {
//     $pdf = new \setasign\Fpdi\Fpdi();
//     $pageCount = $pdf->setSourceFile($source);

//     for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
//         $tpl = $pdf->importPage($pageNo);
//         $size = $pdf->getTemplateSize($tpl);

//         $pdf->AddPage($size['orientation'], [$size['width'], $size['height']]);

//         // ✅ Place the original PDF page first
//         $pdf->useTemplate($tpl, 0, 0, $size['width'], $size['height']);

//         // ✅ Add watermark on top (looks like background if light)
//         $pdf->SetFont('Helvetica', 'B', 30);

//         // Light gray for background feel
//         $pdf->SetTextColor(200, 200, 200);

//         // Center watermark
//         $x = ($size['width'] - $pdf->GetStringWidth($text)) / 2;
//         $y = $size['height'] / 2;
//         $pdf->SetXY($x, $y);
//         $pdf->Cell(0, 0, $text);
//     }

//     return $pdf->Output($output, 'F');
// }






 
    
     public function knowledge()
    {
    
        $categories = KnowledgeCategory::whereNull('category_id')
            ->with('children')
            ->get();
     
        return view('website.knowledge.index',compact('categories'));
    }
     public function branchNew()
    {
    
        return view('website.branch.index_new');
    }
     public function section()
    {
    
        return view('website.branch.section');
    }
     public function branchRed()
    {
    
        return view('website.branch.index_new_red');
    }
 
  public function armyDefence()
    {
   
        return view('website.place_detail.place_detail1');
    }
    public function armyHospital()
    {
   
        return view('website.place_detail.place_detail2');
    }
     public function armyTraining()
    {
   
        return view('website.place_detail.place_detail3');
    }
     public function armyGuide()
    {
   
        return view('website.place_detail.place_detail4');
    }
     public function armyWar()
    {
   
        return view('website.place_detail.place_detail5');
    }
     public function armyMilitary()
    {
   
        return view('website.place_detail.place_detail6');
    }
     private function hitCount($ip,$date)
{ 
   
              $hit = new HitCount;
              $hit->ip = $ip;
              $hit->date = $date;
       
              
             $result = HitCount::where('ip', $ip)
                  ->where('date', $date)
                  ->first();
                 
              if(!$result){
                $hit->save();
              }      
}

    
 public function awards()
    {
        // return all results (no search, no pagination)
        $telDirs = \App\Models\Award::orderBy('id', 'asc')->get();
       

        return view('website.tell.awards', compact('telDirs'));
    }
    public function ajaxSearch(Request $request)
{
    $q = trim($request->input('q'));

    if (!$q) {
        return response()->json([]);
    }

    $term = "%{$q}%";
    $results = [];

    $sources = [
        [
            'model' => WhatsNew::class,
            'type' => 'WhatsNew',
            'url' => url('/'),
            'pdf' => true,
        ],
        
        
       
        [
            'model' => GatePdf::class,
            'type' => 'GatePdf',
            'url' => null,
            'pdf' => true,
        ],
        [
            'model' => ResourcePdf::class,
            'type' => 'ResourcePd',
            'url' => null,
            'pdf' => true,
        ],
        
        [
            'model' => TelDir::class,
            'type' => 'TelDir',
            'url' => url('/tell'),
            'pdf' => false,
        ],
        
        
        [
            'model' => Banner::class,
            'type' => 'Banner',
            'url' => url('/'),
            'pdf' => false,
        ],
        [
            'model' => Branch::class,
            'type' => 'Branch',
            'url' => null,
            'pdf' => false,
        ],
        [
            'model' => Hod::class,
            'type' => 'Hod',
            'url' => url('/hod'),
            'pdf' => false,
        ],
       
       
        
        [
            'model' => Application::class,
            'type' => 'Application',
            'url' => url('/'),
            'pdf' => false,
        ],
       
        [
            'model' => KnowledgeCategory::class,
            'type' => 'KnowledgeCategory',
            'url' => url('/knowledge'),
            'pdf' => false,
        ],
       
       
       
       
        [
            'model' => Gate::class,
            'type' => 'Gate',
            'url' => url('/gate'),
            'pdf' => false,
        ],
        [
            'model' => Resource::class,
            'type' => 'Resource',
            'url' => url('/resource'),
            'pdf' => false,
        ],
       
        
    ];
       
    foreach ($sources as $source) {
        try {
            $modelClass = $source['model'];
            $modelObj = new $modelClass;
            $table = $modelObj->getTable();
             
            if (!\Illuminate\Support\Facades\Schema::hasTable($table)) {
                continue;
            }

            $columns = \Illuminate\Support\Facades\Schema::getColumnListing($table);
           
            $searchColumns = [];
            foreach ($columns as $col) {
                if (in_array($col, ['id', 'created_at', 'updated_at', 'deleted_at', 'status'])) {
                    continue;
                }

                $searchColumns[] = $col;
            }

            if (empty($searchColumns)) {
                continue;
            }

            $query = $modelClass::query();

            $query->where(function ($subQuery) use ($searchColumns, $term) {
                foreach ($searchColumns as $col) {
                    $subQuery->orWhere($col, 'LIKE', $term);
                }
            });

            if (in_array('status', $columns)) {
                $query->where('status', 1);
            }

            $records = $query->limit(5)->get();

            foreach ($records as $record) {
                $title = $this->makeSearchTitle($record, $columns);
                $snippet = $this->makeSearchSnippet($record, $columns, $q);
                $url = $this->makeSearchUrl($record, $source['type'], $source['url']);

                $results[] = [
                    'title' => $title,
                    'snippet' => $snippet,
                    'type' => $source['type'],
                    'model' => class_basename($modelClass),
                    'id' => $record->id,
                    'url' => $url,
                    'is_pdf' => $source['pdf'],
                ];
            }
        } catch (\Exception $e) {
            continue;
        }
    }

    return response()->json(array_slice($results, 0, 30));
}

private function makeSearchTitle($record, $columns)
{
    $titleColumns = [
        'name',
        'title',
        'heading',
        'subject',
        'designation',
        'branch',
        'cat_no',
        'event_title',
        'employee_name',
    ];

    foreach ($titleColumns as $col) {
        if (in_array($col, $columns) && !empty($record->{$col})) {
            return strip_tags($record->{$col});
        }
    }

    return 'Search Result #' . $record->id;
}

private function makeSearchSnippet($record, $columns, $q)
{
    foreach ($columns as $col) {
        if (in_array($col, ['id', 'created_at', 'updated_at', 'deleted_at'])) {
            continue;
        }

        $value = $record->{$col} ?? '';

        if (!$value) {
            continue;
        }

        $plain = trim(strip_tags((string) $value));

        if (stripos($plain, $q) !== false) {
            return \Illuminate\Support\Str::limit($plain, 120);
        }
    }

    return '';
}

private function makeSearchUrl($record, $type, $defaultUrl)
{
    if ($type == 'Branch') {
        if (!empty($record->slug)) {
            return url('/branch/' . $record->slug);
        }

        return url('/');
    }

   

    return $defaultUrl ?: url('/');
}
    
}
