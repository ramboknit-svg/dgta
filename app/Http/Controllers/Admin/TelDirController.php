<?php

namespace App\Http\Controllers\Admin;

use App\Models\TelDir;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateTelRequest;
use Exception;
use Illuminate\Support\Facades\Redirect;

class TelDirController extends Controller
{
    public function index()
    {
        $items = TelDir::orderBy('id', 'DESC')->get();
        return view('admin.tel_dir.index', compact('items'));
    }

    public function csvForm()
    {
        return view('admin.tel_dir.add');
    }

    public function getTelDir(Request $request, $id)
    {
        try {
            $item = TelDir::query()->where(['id' => $id])->first();
            return view('admin.tel_dir.update', compact('item'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

   public function upload(Request $request)
{
    $request->validate([
        'csv_file' => 'required|file|mimes:csv,txt',
    ]);

    $file = $request->file('csv_file');

    if (!$file || !$file->isValid()) {
        return back()->with('error', 'Invalid file upload.');
    }

    $path = $file->getRealPath();

    if (($handle = fopen($path, 'r')) === false) {
        return back()->with('error', 'Unable to open CSV file.');
    }

    $header = fgetcsv($handle);

    if (!$header || count($header) < 8) {
        fclose($handle);
        return back()->with('error', 'CSV file is empty or header is invalid.');
    }

    $normalizedHeader = array_map(function ($value) {
        $value = preg_replace('/^\xEF\xBB\xBF/', '', $value);
        $value = strtolower(trim($value));
        $value = str_replace([' ', '-'], '_', $value);
        return $value;
    }, $header);

    $expected = ['rank', 'name', 'appointment', 'br', 'dos', 'tos', 'nfs', 'intercom'];

    if ($normalizedHeader !== $expected) {
        fclose($handle);
        return back()->with('error', 'CSV header must be: rank,name,appointment,br,dos,tos,nfs,intercom');
    }

    // remove old data first
    \DB::table('tel_dirs')->truncate();

    $inserted = 0;

    while (($row = fgetcsv($handle, 1000, ',')) !== false) {
        $row = array_pad($row, 8, '');

        // stop when blank row comes after test133
        if (
            trim($row[0]) === '' &&
            trim($row[1]) === '' &&
            trim($row[2]) === '' &&
            trim($row[3]) === '' &&
            trim($row[4]) === '' &&
            trim($row[5]) === '' &&
            trim($row[6]) === '' &&
            trim($row[7]) === ''
        ) {
            break;
        }

        TelDir::create([
            'rank' => trim($row[0]),
            'name' => trim($row[1]),
            'appointment' => trim($row[2]),
            'br' => trim($row[3]),
            'dos' => trim($row[4]),
            'tos' => trim($row[5]),
            'nfs' => trim($row[6]),
            'intercom' => trim($row[7]),
        ]);

        $inserted++;
    }

    fclose($handle);

    return back()->with('message', "CSV uploaded successfully. Total inserted: {$inserted}");
}

    public function updateTelDir(UpdateTelRequest $request)
    {
        if ($request->isMethod('post')) {
            try {
                $id = $request->input('id');
                $item = TelDir::query()->where('id', $id)->first();
                $requestData = $request->all();
                $item->update($requestData);
                return Redirect::to('admin/teldir_list')->withMessage('Updated Successfully.');
            } catch (Exception $e) {
                return redirect()->back()->withErrors($e->getMessage());
            }
        }
    }

    public function deleteTelDir($id)
    {
        $item = TelDir::findOrfail($id);
        $item->delete();
        return redirect()->back()->withMessage('Deleted Successfully!');
    }
}
