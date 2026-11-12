<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\SearchController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\HODController;
use App\Http\Controllers\Admin\DgtaDetailController;
use App\Http\Controllers\Admin\ApplicationController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PlaceController;
use App\Http\Controllers\Admin\KnowledgeController;
use App\Http\Controllers\Admin\NewController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\SectionDetailController;
use App\Http\Controllers\Admin\BranchDetailController;
use App\Http\Controllers\Admin\BulletinController;
use App\Http\Controllers\Admin\PlaceDetailController;
use App\Http\Controllers\Admin\ContactusController;
use App\Http\Controllers\Website\Home\HomeController;
use App\Http\Controllers\Admin\AwardController;
use App\Http\Controllers\Admin\TelDirController;
use App\Http\Controllers\Admin\KnowledgeCategoryController;
use App\Http\Controllers\Admin\ResourceController;
use App\Http\Controllers\Admin\ResourcePdfController;
use App\Http\Controllers\Admin\GateController;
use App\Http\Controllers\Admin\GatePdfController;
use App\Http\Controllers\Admin\AdminForgotPasswordController;


   // Forgot password Route
Route::get('/forgot-password', [AdminForgotPasswordController::class, 'forgotPassword'])
    ->name('forgot.password');

Route::post('/forgot-password-check', [AdminForgotPasswordController::class, 'checkQuestion'])
    ->name('forgot.password.check');

Route::get('/reset-password', [AdminForgotPasswordController::class, 'resetPassword'])
    ->name('reset.password');

Route::post('/update-password', [AdminForgotPasswordController::class, 'updatePassword'])
    ->name('update.password');
Route::get('/admin', [LoginController::class, 'loginPage'])->middleware('guest')->name('login');
Route::post('/admin/login', [LoginController::class, 'login'])->name('Admin.Login');
Route::get('/admin/logout', [LoginController::class, 'logout'])->name('Admin.Logout');
Route::post('/download-whatsnew/{id}', [HomeController::class, 'downloadWhatsNew'])
    ->name('whatsnew.download');
      Route::post('/download-news/{id}', [HomeController::class, 'downloadNews'])
    ->name('news.download');

Route::group([
    'prefix' => 'admin',
    'as' => 'Admin.',
    'middleware' => ['admin']
], function() {
    // Admin Route
    Route::get('/dashboard', [LoginController::class, 'index'])->name('Admin.Dashboard');
    Route::get('/profile', [AdminController::class, 'profile'])->name('Admin.Profile');
    Route::get('/change-password-view', [AdminController::class, 'changePasswordView'])->name('Admin.ChangePassword.View');
    Route::get('/get-profile', [AdminController::class, 'getProfile'])->name('Admin.Get.Profile');
    Route::post('/change-password', [AdminController::class, 'changePassword'])->name('Admin.ChangePassword');
    Route::post('/update-profile', [AdminController::class, 'updateProfile'])->name('Admin.Update.Profile');
    //Banner 
    Route::get('/banner_list', [BannerController::class,'index']);
    Route::get('/banner_add', [BannerController::class,'addBannerView']);
    Route::get('/banner_edit/{id}',[BannerController::class,'editBanner']);
    Route::get('/banner_delete/{id}',[BannerController::class,'deleteBanner']);
    Route::post('/banner_add', [BannerController::class,'addBanner']);
    Route::post('/banner_update',[BannerController::class,'updateBanner']);

        //HOD 
    Route::get('/hod_list', [HODController::class,'index']);
    Route::get('/hod_add', [HODController::class,'addHodView']);
    Route::get('/hod_edit/{id}',[HODController::class,'editHod']);
    Route::get('/hod_delete/{id}',[HODController::class,'deleteHod']);
    Route::post('/hod_add', [HODController::class,'addHod']);
    Route::post('/hod_update',[HODController::class,'updateHod']);

    //DGTA Deails
    Route::get('/dgta_list', [DgtaDetailController::class,'index']);
    Route::get('/dgta_edit/{id}',[DgtaDetailController::class,'editHod']);
    Route::post('/dgta_update',[DgtaDetailController::class,'updateHod']);
    
    
    //Branch 
    Route::get('/branch_list', [BranchController::class,'index']);
    Route::get('/branch_add', [BranchController::class,'addBranchView']);
    Route::get('/branch_edit/{id}',[BranchController::class,'editBranch']);
    Route::get('/branch_delete/{id}',[BranchController::class,'deleteBranch']);
    Route::post('/branch_add', [BranchController::class,'addBranch']);
    Route::post('/branch_update',[BranchController::class,'updateBranch']);


      //Applications 
    Route::get('/application_list', [ApplicationController::class,'index']);
    Route::get('/application_add', [ApplicationController::class,'addApplicationView']);
    Route::get('/application_edit/{id}',[ApplicationController::class,'editApplication']);
    Route::get('/application_delete/{id}',[ApplicationController::class,'deleteApplication']);
    Route::post('/application_add', [ApplicationController::class,'addApplication']);
    Route::post('/application_update',[ApplicationController::class,'updateApplication']);
 
 
                    //E-News 
    Route::get('/news_list', [NewsController::class,'index']);
    Route::get('/news_add', [NewsController::class,'addNewsView']);
    Route::get('/news_edit/{id}',[NewsController::class,'editNews']);
    Route::get('/news_delete/{id}',[NewsController::class,'deleteNews']);
    Route::post('/news_add', [NewsController::class,'addNews']);
    Route::post('/news_update',[NewsController::class,'updateNews']);

     //Places 
    Route::get('/place_list', [PlaceController::class,'index']);
    Route::get('/place_add', [PlaceController::class,'addplaceView']);
    Route::get('/place_edit/{id}',[PlaceController::class,'editplace']);
    Route::get('/place_delete/{id}',[PlaceController::class,'deleteplace']);
    Route::post('/place_add', [PlaceController::class,'addplace']);
    Route::post('/place_update',[PlaceController::class,'updateplace'])
    ;
      // Section 
    Route::get('/section_list', [SectionController::class,'index']);
    Route::get('/section_add', [SectionController::class,'addsectionView']);
    Route::get('/section_edit/{id}',[SectionController::class,'editsection']);
    Route::get('/section_delete/{id}',[SectionController::class,'deletesection']);
    Route::post('/section_add', [SectionController::class,'addsection']);
    Route::post('/section_update',[SectionController::class,'updatesection'])
    ;
    // Section Detail
    Route::get('/section_detail_list', [SectionDetailController::class,'index']);
    Route::get('/section_detail_add', [SectionDetailController::class,'addsectionDetailView']);
    Route::get('/section_detail_edit/{id}',[SectionDetailController::class,'editsectionDetail']);
    Route::get('/section_detail_delete/{id}',[SectionDetailController::class,'deleteDetail']);
    Route::post('/section_detail_add', [SectionDetailController::class,'addsectionDetail']);
    Route::post('/section_detail_update',[SectionDetailController::class,'updatesectionDetail'])
    ;
   // branch Detail
    Route::get('/branch_detail_list', [BranchDetailController::class,'index']);
    Route::get('/branch_detail_add', [BranchDetailController::class,'addBranchDetailView']);
    Route::get('/branch_detail_edit/{id}',[BranchDetailController::class,'editBranchDetail']);
    Route::get('/branch_detail_delete/{id}',[BranchDetailController::class,'deleteBranchDetail']);
    Route::post('/branch_detail_add', [BranchDetailController::class,'addBranchDetail']);
    Route::post('/branch_detail_update',[BranchDetailController::class,'updateBranchDetail'])
    ;

     
                    //Knowledge 
    Route::get('/knowledge_list', [KnowledgeController::class,'index']);
    Route::get('/knowledge_add', [KnowledgeController::class,'addKnowledgeView']);
    Route::get('/knowledge_edit/{id}',[KnowledgeController::class,'editKnowledge']);
    Route::get('/knowledge_delete/{id}',[KnowledgeController::class,'deleteKnowledge']);
    Route::post('/knowledge_add', [KnowledgeController::class,'addKnowledge']);
    Route::post('/knowledge_update',[KnowledgeController::class,'updateKnowledge']);


                    //Whats-New 
    Route::get('/new_list', [NewController::class,'index']);
    Route::get('/new_add', [NewController::class,'addNewView']);
    Route::get('/new_edit/{id}',[NewController::class,'editNew']);
    Route::get('/new_delete/{id}',[NewController::class,'deleteNew']);
    Route::post('/new_add', [NewController::class,'addNew']);
    Route::post('/new_update',[NewController::class,'updateNew']);

    //Banner 
    Route::get('/movie_list', [MovieController::class,'index']);
    Route::get('/movie_add', [MovieController::class,'addMovieView']);
    Route::get('/movie_edit/{id}',[MovieController::class,'editMovie']);
    Route::post('/movie_add', [MovieController::class,'addMovie']);
    Route::post('/movie_update',[MovieController::class,'updateMovie']);
    
    //Bulletin 
    Route::get('/bulletin_list', [BulletinController::class,'index']);
    Route::get('/bulletin_add', [BulletinController::class,'addBulletinView']);
    Route::get('/bulletin_edit/{id}',[BulletinController::class,'editBulletin']);
    Route::get('/bulletin_delete/{id}',[BulletinController::class,'deleteBulletin']);
    Route::post('/bulletin_add', [BulletinController::class,'addBulletin']);
    Route::post('/bulletin_update',[BulletinController::class,'updateBulletin']);

      // Place Detail
    Route::get('/place_detail_list', [PlaceDetailController::class,'index']);
    Route::get('/place_detail_add', [PlaceDetailController::class,'addPlaceDetailView']);
    Route::get('/place_detail_edit/{id}',[PlaceDetailController::class,'editPlaceDetail']);
    Route::get('/place_detail_delete/{id}',[PlaceDetailController::class,'deletePlaceDetail']);
    Route::post('/place_detail_add', [PlaceDetailController::class,'addPlaceDetail']);
    Route::post('/place_detail_update',[PlaceDetailController::class,'updatePlaceDetail']);
    
    // Contact Route
    Route::get('/contact',[ContactusController::class,'index']);
    Route::get('/contact_delete/{id}',[ContactusController::class,'deleteContact']);
    Route::get('/contact_view/{id}', [ContactusController::class,'viewContact']);
    
     //Bulletin 
    Route::get('/resource_list', [BulletinController::class,'index']);
    Route::get('/resource_add', [BulletinController::class,'addResourceView']);
    Route::get('/resource_edit/{id}',[BulletinController::class,'editResource']);
    Route::get('/resource_delete/{id}',[BulletinController::class,'deleteResource']);
    Route::post('/resource_add', [BulletinController::class,'addResource']);
    Route::post('/resource_update',[BulletinController::class,'updateResource']);

    // Award
        Route::get('award_list',[AwardController::class, 'index']);
        Route::get('edit_award/{id}', [AwardController::class,'getAward']);
      
        Route::post('update_award', [AwardController::class,'updateAward']);
        Route::get('delete_award/{id}',[AwardController::class,'deleteAward']);
         Route::get('/award_add', [AwardController::class,'addAwardView']);
         Route::post('/award_add', [AwardController::class,'addAward']);

          // Tel Directory
        Route::get('teldir_list',[TelDirController::class, 'index']);
        Route::get('edit_teldir/{id}', [TelDirController::class,'getTelDir']);
        Route::get('teldir-upload', [TelDirController::class,'csvForm']);
        Route::post('teldir-upload', [TelDirController::class,'upload']);
        Route::post('update_teldir', [TelDirController::class,'updateTelDir']);
        Route::get('delete_teldir/{id}',[TelDirController::class,'deleteTelDir']);

        // Knowledge category
        Route::get('knowledge_category_list',[KnowledgeCategoryController::class, 'index']);
        Route::get('edit_knowledge_category/{id}', [KnowledgeCategoryController::class,'getKnowledgeCategory']);
         Route::get('add_knowledge_category_form', [KnowledgeCategoryController::class,'addKnowledgeCategoryForm']);
          Route::post('add_knowledge_category', [KnowledgeCategoryController::class,'addKnowledgeCategory']);
        Route::post('update_knowledge_category', [KnowledgeCategoryController::class,'updateKnowledgeCategory']);
        Route::get('delete_knowledge_category/{id}',[KnowledgeCategoryController::class,'deleteKnowledgeCategory']);

        // Resource module
    Route::get('resources_list',[ResourceController::class, 'index']);
    Route::get('edit_resource/{id}', [ResourceController::class,'getResource']);
    Route::get('add_resource_form', [ResourceController::class,'addResourceForm']);
    Route::post('add_resource', [ResourceController::class,'addResource']);
    Route::post('update_resource', [ResourceController::class,'updateResource']);
    Route::get('delete_resource/{id}',[ResourceController::class,'deleteResource']);
    Route::post('get_sub_resource', [ResourceController::class, 'getSubResourceCategory']);

        // Resource Pdf
      Route::get('resource_pdf_list',[ResourcePdfController::class, 'index']);
      Route::get('edit_resource_pdf/{id}', [ResourcePdfController::class,'getResourcePdf']);
      Route::get('add_resource_pdf_form', [ResourcePdfController::class,'addResourcePdfForm']);
      Route::post('add_resource_pdf', [ResourcePdfController::class,'addResourcePdf']);
      Route::post('update_resource_pdf', [ResourcePdfController::class,'updateResourcePdf']);
      Route::get('delete_resource_pdf/{id}',[ResourcePdfController::class,'deleteResourcePdf']);
      // Gate module
    Route::get('gate_list',[GateController::class, 'index']);
    Route::get('edit_gate/{id}', [GateController::class,'getGate']);
    Route::get('add_gate_form', [GateController::class,'addGateForm']);
    Route::post('add_gate', [GateController::class,'addGate']);
    Route::post('update_gate', [GateController::class,'updateGate']);
    Route::get('delete_gate/{id}',[GateController::class,'deleteGate']);
    Route::post('get_sub_gate', [GateController::class, 'getSubGateCategory']);

        // Gate Pdf
      Route::get('gate_pdf_list',[GatePdfController::class, 'index']);
      Route::get('edit_gate_pdf/{id}', [GatePdfController::class,'getGatePdf']);
      Route::get('add_gate_pdf_form', [GatePdfController::class,'addGatePdfForm']);
      Route::post('add_gate_pdf', [GatePdfController::class,'addGatePdf']);
      Route::post('update_gate_pdf', [GatePdfController::class,'updateGatePdf']);
      Route::get('delete_gate_pdf/{id}',[GatePdfController::class,'deleteGatePdf']);
      
       // Users
      Route::get('users-list',[UsersController::class, 'index'])->name('users.index');
      Route::get('edit-user/{id}', [UsersController::class,'getUser']);
      Route::get('add-user-form', [UsersController::class,'addUserForm']);
      Route::post('add-user', [UsersController::class,'addUser']);
      Route::post('update-user', [UsersController::class,'updateUser']);
      Route::get('delete-user/{id}',[UsersController::class,'deleteUser']);



});

// Clear cache:
Route::get('clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
    Artisan::call('config:clear');
    return '<h1>Cache facade value cleared</h1>';
});
