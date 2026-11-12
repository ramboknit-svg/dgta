<?php

use App\Http\Controllers\Website\Home\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
|--------------------------------------------------------------------------
| Home Routes
|--------------------------------------------------------------------------*/


Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'homePage')->name('home');
    Route::get('/hod', 'hod')->name('hod');
    Route::get('/cosco', 'cosco')->name('cosco');
     Route::get('/dgta', 'cosco')->name('dgta');
     Route::get('/awards', 'awards')->name('awards');
    
      Route::get('/test-dd', function () {
    dd('Route file is working');
});
    Route::get('/branch/{slug}', [HomeController::class, 'branch'])->name('branch');
    Route::post('/hit_count', [HomeController::class, 'hitCount']);
    Route::get('/goc', [HomeController::class, 'goc'])->name('branch');
     Route::get('/cos', [HomeController::class, 'cos'])->name('cos');
    Route::get('/gs', [HomeController::class, 'gs'])->name('gs');
    Route::get('/adm', [HomeController::class, 'adm'])->name('adm');
    Route::get('/doc', [HomeController::class, 'doc'])->name('doc');
    Route::get('/trg_a', [HomeController::class, 'trg_a'])->name('trg_a');
    Route::get('/trg_b', [HomeController::class, 'trg_b'])->name('trg_b');
     Route::get('/apvl', [HomeController::class, 'apvl'])->name('apvl');
   Route::get('/knowledge', [HomeController::class, 'knowledge'])->name('knowledge');
   Route::get('/branch_ms', [HomeController::class, 'branchNew'])->name('branch_new');
    Route::get('/section', [HomeController::class, 'section'])->name('section');
    Route::get('/branch_red', [HomeController::class, 'branchRed'])->name('branch_red');
////// for call and infosis bulletin
    Route::get('/call_bulletin', [HomeController::class, 'callBulletin'])->name('call_bulletin');
    Route::get('/infosis_bulletin', [HomeController::class, 'infosisBulletin'])->name('infosis_bulletin');
    ///// for placeof interset
    Route::get('/army_defence', [HomeController::class, 'ArmyDefence'])->name('army_defence');
    Route::get('/army_hospital', [HomeController::class, 'armyHospital'])->name('army_hospital');
    Route::get('/army_training', [HomeController::class, 'armyTraining'])->name('army_training');
    Route::get('/army_guide', [HomeController::class, 'armyGuide'])->name('army_guide');
    Route::get('/army_war', [HomeController::class, 'armyWar'])->name('army_war');
    Route::get('/army_military', [HomeController::class, 'armyMilitary'])->name('army_military');
    ////////feedback
    Route::get('/contact_us',  'contactUs') ->name('contact_us');
    Route::post('/contact_submit', 'contactSubmit');
    });
    Route::get('/org', [HomeController::class, 'org']);
    Route::get('/not_found', [HomeController::class, 'notFound']);
    Route::get('/tell', [HomeController::class, 'tell']);
    Route::get('/resource', [HomeController::class, 'resource']);
    Route::get('/study', [HomeController::class, 'study']);
    Route::get('/gate', [HomeController::class, 'gate']);
     Route::get('/gate/notes/{category}', [HomeController::class, 'notesGateByCategory'])
    ->name('gate.notes.byCategory');
    Route::post('/gate_pdf/{id}', [HomeController::class, 'downloadGatePdf'])
    ->name('gate_pdf.download');
     Route::get('/stn', [HomeController::class, 'stn']);
        Route::get('/fp_cell', [HomeController::class, 'fp'])->name('fp');
    Route::get('/exam_cell', [HomeController::class, 'exam'])->name('exam');
    Route::post('/download-whatsnew/{id}', [HomeController::class, 'downloadWhatsNew'])
    ->name('whatsnew.download');
     Route::post('/download-news/{id}', [HomeController::class, 'downloadNews'])
    ->name('news.download');
     Route::get('/resource/notes/{category}', [HomeController::class, 'notesResourceByCategory'])
    ->name('resource.notes.byCategory');
    Route::post('/resource_pdf/{id}', [HomeController::class, 'downloadResourcePdf'])
    ->name('resource_pdf.download');
        Route::get('/search/ajax', [HomeController::class, 'ajaxSearch'])->name('search.ajax');
  
  
   
