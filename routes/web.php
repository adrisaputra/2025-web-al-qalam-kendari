<?php

use App\Http\Controllers\AcademicController;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\SpmbController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\WorkUnitController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/clear-cache-all', function() {
    Artisan::call('cache:clear');
    Artisan::call('route:cache');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
    dd("Cache Clear All");
});

Route::get('/buat_storage', function () {
    Artisan::call('storage:link');
    dd("Storage Berhasil Di Buat");
});

Route::get('/refresh-captcha', function () {
    return response()->json(['captcha' => captcha_img('math')]);
})->name('refresh.captcha');


Route::get('/', [WebController::class, 'index']);
Route::get('/page-spmb', [WebController::class, 'spmb']);
Route::get('/page-spmb-detail/{work_unit}', [WebController::class, 'spmb_detail']);

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);


Route::middleware(['role:Administrator,Operator'])->group(function () {
    
    Route::get('/dashboard', [HomeController::class, 'index']);
    Route::post('/logout', [LoginController::class, 'logout']);
    
    ## Slider
    Route::get('/slider', [SliderController::class, 'index'])->name('sliders.index');
    Route::get('/slider/list/{url}', [SliderController::class, 'get_slider_index'])->name('sliders.list');
    Route::post('/slider/store', [SliderController::class, 'store']);
    Route::post('/slider/validate/{action}', [SliderController::class, 'validate']);
    Route::get('/slider/edit/{slider}', [SliderController::class, 'edit']);
    Route::put('/slider/edit/{slider}', [SliderController::class, 'update']);
    Route::get('/slider/delete/{slider}',[SliderController::class, 'delete']);
    
    ## Profiles
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::get('/vision', [ProfileController::class, 'index']);
    Route::get('/mission', [ProfileController::class, 'index']);
    Route::get('/structure', [ProfileController::class, 'index']);
    Route::post('/profile/validate', [ProfileController::class, 'validation']);
    Route::put('/profile/edit/{profile}', [ProfileController::class, 'update']);
    
    ## Facility
    Route::get('/facility', [FacilityController::class, 'index'])->name('facility.index');
    Route::get('/facility/list', [FacilityController::class, 'get_facility_index'])->name('facility.list');
    Route::post('/facility/store', [FacilityController::class, 'store']);
    Route::post('/facility/validate/{action}', [FacilityController::class, 'validate']);
    Route::get('/facility/edit/{facility}', [FacilityController::class, 'edit']);
    Route::put('/facility/edit/{facility}', [FacilityController::class, 'update']);
    Route::get('/facility/delete/{facility}',[FacilityController::class, 'delete']);

    ## News
    Route::get('/news', [NewsController::class, 'index'])->name('news.index');
    Route::get('/news/list', [NewsController::class, 'get_news_index'])->name('news.list');
    Route::post('news/upload_image',[NewsController::class, 'upload_image'])->name('upload_news');
    Route::post('/news/store', [NewsController::class, 'store']);
    Route::post('/news/validate/{action}', [NewsController::class, 'validate']);
    Route::get('/news/edit/{news}', [NewsController::class, 'edit']);
    Route::put('/news/edit/{news}', [NewsController::class, 'update']);
    Route::get('/news/delete/{news}',[NewsController::class, 'delete']);

    ## Article
    Route::get('/article', [ArticleController::class, 'index'])->name('article.index');
    Route::get('/article/list', [ArticleController::class, 'get_article_index'])->name('article.list');
    Route::post('article/upload_image',[ArticleController::class, 'upload_image'])->name('upload_article');
    Route::post('/article/store', [ArticleController::class, 'store']);
    Route::post('/article/validate/{action}', [ArticleController::class, 'validate']);
    Route::get('/article/edit/{article}', [ArticleController::class, 'edit']);
    Route::put('/article/edit/{article}', [ArticleController::class, 'update']);
    Route::get('/article/delete/{article}',[ArticleController::class, 'delete']);

    ## Social
    Route::get('/social', [SocialController::class, 'index'])->name('social.index');
    Route::get('/social/list', [SocialController::class, 'get_social_index'])->name('social.list');
    Route::post('social/upload_image',[SocialController::class, 'upload_image'])->name('upload_social');
    Route::post('/social/store', [SocialController::class, 'store']);
    Route::post('/social/validate/{action}', [SocialController::class, 'validate']);
    Route::get('/social/edit/{social}', [SocialController::class, 'edit']);
    Route::put('/social/edit/{social}', [SocialController::class, 'update']);
    Route::get('/social/delete/{social}',[SocialController::class, 'delete']);

    ## Agenda
    Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda.index');
    Route::get('/agenda/list', [AgendaController::class, 'get_agenda_index'])->name('agenda.list');
    Route::post('/agenda/store', [AgendaController::class, 'store']);
    Route::post('/agenda/validate/{action}', [AgendaController::class, 'validate']);
    Route::get('/agenda/edit/{agenda}', [AgendaController::class, 'edit']);
    Route::put('/agenda/edit/{agenda}', [AgendaController::class, 'update']);
    Route::get('/agenda/delete/{agenda}',[AgendaController::class, 'delete']);

    ## Slider SPMB
    Route::get('/slider_spmb', [SliderController::class, 'index'])->name('sliders.index');
    Route::get('/slider_spmb/list/{url}', [SliderController::class, 'get_slider_index'])->name('sliders.list');
    Route::post('/slider_spmb/store', [SliderController::class, 'store']);
    Route::post('/slider_spmb/validate/{action}', [SliderController::class, 'validate']);
    Route::get('/slider_spmb/edit/{slider}', [SliderController::class, 'edit']);
    Route::put('/slider_spmb/edit/{slider}', [SliderController::class, 'update']);
    Route::get('/slider_spmb/delete/{slider}',[SliderController::class, 'delete']);
    
    ## SPMB
    Route::get('/spmb', [SpmbController::class, 'index'])->name('spmb.index');
    Route::get('/spmb/list', [SpmbController::class, 'get_spmb_index'])->name('spmb.list');
    Route::post('/spmb/store', [SpmbController::class, 'store']);
    Route::post('/spmb/validate/{action}', [SpmbController::class, 'validate']);
    Route::get('/spmb/edit/{work_unit}', [SpmbController::class, 'edit']);
    Route::put('/spmb/edit/{work_unit}', [SpmbController::class, 'update']);
    Route::get('/spmb/delete/{work_unit}',[SpmbController::class, 'delete']);
    
    ## Achievement (Academic)
    Route::get('/academic', [AchievementController::class, 'index'])->name('achievement.index');
    Route::get('/academic/list/{url}', [AchievementController::class, 'get_achievement_index'])->name('achievement.list');
    Route::post('academic/upload_image',[AchievementController::class, 'upload_image'])->name('upload_achievement');
    Route::post('/academic/store', [AchievementController::class, 'store']);
    Route::post('/academic/validate/{action}', [AchievementController::class, 'validate']);
    Route::get('/academic/edit/{achievement}', [AchievementController::class, 'edit']);
    Route::put('/academic/edit/{achievement}', [AchievementController::class, 'update']);
    Route::get('/academic/delete/{achievement}',[AchievementController::class, 'delete']);
    
    ## Achievement (Non Academic)
    Route::get('/non_academic', [AchievementController::class, 'index'])->name('achievement.index');
    Route::get('/non_academic/list/{url}', [AchievementController::class, 'get_achievement_index'])->name('achievement.list');
    Route::post('non_academic/upload_image',[AchievementController::class, 'upload_image'])->name('upload_achievement');
    Route::post('/non_academic/store', [AchievementController::class, 'store']);
    Route::post('/non_academic/validate/{action}', [AchievementController::class, 'validate']);
    Route::get('/non_academic/edit/{achievement}', [AchievementController::class, 'edit']);
    Route::put('/non_academic/edit/{achievement}', [AchievementController::class, 'update']);
    Route::get('/non_academic/delete/{achievement}',[AchievementController::class, 'delete']);
      
    ## Program (Featured Program)
    Route::get('/featured_program', [ProgramController::class, 'index'])->name('program.index');
    Route::get('/featured_program/list/{url}', [ProgramController::class, 'get_program_index'])->name('program.list');
    Route::post('featured_program/upload_image',[ProgramController::class, 'upload_image'])->name('upload_program');
    Route::post('/featured_program/store', [ProgramController::class, 'store']);
    Route::post('/featured_program/validate/{action}', [ProgramController::class, 'validate']);
    Route::get('/featured_program/edit/{program}', [ProgramController::class, 'edit']);
    Route::put('/featured_program/edit/{program}', [ProgramController::class, 'update']);
    Route::get('/featured_program/delete/{program}',[ProgramController::class, 'delete']);
      
    ## Program (Extracurricular)
    Route::get('/extracurricular', [ProgramController::class, 'index'])->name('achievement.index');
    Route::get('/extracurricular/list/{url}', [ProgramController::class, 'get_achievement_index'])->name('achievement.list');
    Route::post('extracurricular/upload_image',[ProgramController::class, 'upload_image'])->name('upload_achievement');
    Route::post('/extracurricular/store', [ProgramController::class, 'store']);
    Route::post('/extracurricular/validate/{action}', [ProgramController::class, 'validate']);
    Route::get('/extracurricular/edit/{achievement}', [ProgramController::class, 'edit']);
    Route::put('/extracurricular/edit/{achievement}', [ProgramController::class, 'update']);
    Route::get('/extracurricular/delete/{achievement}',[ProgramController::class, 'delete']);
    
    ## Academic (Curriculum)
    Route::get('/curriculum', [AcademicController::class, 'index'])->name('academic.index');
    Route::get('/curriculum/list/{url}', [AcademicController::class, 'get_academic_index'])->name('academic.list');
    Route::post('curriculum/upload_image',[AcademicController::class, 'upload_image'])->name('upload_academic');
    Route::post('/curriculum/store', [AcademicController::class, 'store']);
    Route::post('/curriculum/validate/{action}', [AcademicController::class, 'validate']);
    Route::get('/curriculum/edit/{academic}', [AcademicController::class, 'edit']);
    Route::put('/curriculum/edit/{academic}', [AcademicController::class, 'update']);
    Route::get('/curriculum/delete/{academic}',[AcademicController::class, 'delete']);
      
    ## Academic (Academic Calendar)
    Route::get('/academic_calendar', [AcademicController::class, 'index'])->name('academic.index');
    Route::get('/academic_calendar/list/{url}', [AcademicController::class, 'get_academic_index'])->name('academic.list');
    Route::post('academic_calendar/upload_image',[AcademicController::class, 'upload_image'])->name('upload_academic');
    Route::post('/academic_calendar/store', [AcademicController::class, 'store']);
    Route::post('/academic_calendar/validate/{action}', [AcademicController::class, 'validate']);
    Route::get('/academic_calendar/edit/{academic}', [AcademicController::class, 'edit']);
    Route::put('/academic_calendar/edit/{academic}', [AcademicController::class, 'update']);
    Route::get('/academic_calendar/delete/{academic}',[AcademicController::class, 'delete']);
      
    ## Album
    Route::get('/album', [AlbumController::class, 'index'])->name('album.index');
    Route::get('/album/list', [AlbumController::class, 'get_album_index'])->name('album.list');
    Route::post('/album/store', [AlbumController::class, 'store']);
    Route::post('/album/validate/{action}', [AlbumController::class, 'validate']);
    Route::get('/album/edit/{album}', [AlbumController::class, 'edit']);
    Route::put('/album/edit/{album}', [AlbumController::class, 'update']);
    Route::get('/album/delete/{album}',[AlbumController::class, 'delete']);

    ## Photo
    Route::get('/photo/{album}', [PhotoController::class, 'index'])->name('photos.index');
    Route::get('/photo/list/{album}', [PhotoController::class, 'get_photo_index'])->name('photos.list');
    Route::post('/photo/store', [PhotoController::class, 'store']);
    Route::post('/photo/validate/{action}', [PhotoController::class, 'validate']);
    Route::get('/photo/edit/{photo}', [PhotoController::class, 'edit']);
    Route::put('/photo/edit/{photo}', [PhotoController::class, 'update']);
    Route::get('/photo/delete/{photo}',[PhotoController::class, 'delete']);

    ## Video
    Route::get('/video', [VideoController::class, 'index'])->name('video.index');
    Route::get('/video/list', [VideoController::class, 'get_video_index'])->name('video.list');
    Route::post('/video/store', [VideoController::class, 'store']);
    Route::post('/video/validate/{action}', [VideoController::class, 'validate']);
    Route::get('/video/edit/{video}', [VideoController::class, 'edit']);
    Route::put('/video/edit/{video}', [VideoController::class, 'update']);
    Route::get('/video/delete/{video}',[VideoController::class, 'delete']);

    ## Work Unit
    Route::get('/work_unit', [WorkUnitController::class, 'index'])->name('work_unit.index');
    Route::get('/work_unit/list', [WorkUnitController::class, 'get_work_unit_index'])->name('work_unit.list');
    Route::post('/work_unit/store', [WorkUnitController::class, 'store']);
    Route::post('/work_unit/validate/{action}', [WorkUnitController::class, 'validate']);
    Route::get('/work_unit/edit/{work_unit}', [WorkUnitController::class, 'edit']);
    Route::put('/work_unit/edit/{work_unit}', [WorkUnitController::class, 'update']);
    Route::get('/work_unit/delete/{work_unit}',[WorkUnitController::class, 'delete']);
    
    ##  Edit Profile
    Route::get('/edit_profil/{user}',[UserController::class, 'edit_profil']);
    Route::post('/edit_profil/validate/{action}', [UserController::class, 'validate_profile']);
    Route::put('/edit_profil/{user}',[UserController::class, 'update_profil']);
});

Route::middleware(['role:Administrator'])->group(function () {

    ## User
    Route::get('/user', [UserController::class, 'index'])->name('users.index');
    Route::get('/user/list', [UserController::class, 'get_user_index'])->name('users.list');
    Route::post('/user/store', [UserController::class, 'store']);
    Route::post('/user/validate/{action}', [UserController::class, 'validate']);
    Route::get('/user/edit/{user}', [UserController::class, 'edit']);
    Route::put('/user/edit/{user}', [UserController::class, 'update']);
    Route::get('/user/delete/{user}', [UserController::class, 'delete']);

    ## Log
    Route::get('/log', [LogController::class, 'index'])->name('logs.index');
    Route::get('/log/list', [LogController::class, 'get_log_index'])->name('logs.list');
    Route::get('/log/detail/{user}', [LogController::class, 'detail']);

    ## Setting
    Route::get('/setting', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/setting/validate', [SettingController::class, 'validate']);
    Route::put('/setting/edit/{setting}', [SettingController::class, 'update']);

});  


