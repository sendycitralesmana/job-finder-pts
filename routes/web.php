<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InterviewController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\QualificationController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VacancyController;
use App\Models\Vacancy;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/verify/{token}', [AuthController::class, 'verify']);
Route::get('/cek-role', [AuthController::class, 'cekRole']);

// route middleware is-applicant
Route::middleware(['is-applicant'])->group(function () {
    
    // route frontoffice
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/about', [HomeController::class, 'about']);
    Route::get('/contact', [HomeController::class, 'contact']);
    
    // grup job
    Route::prefix('job')->group(function () {
        Route::get('/', [JobController::class, 'job']);
        
        // grup job_id
        Route::group(['prefix' => '{job_id}'], function () {
            Route::get('/application-letter-preview', [JobController::class, 'applicationLetterPreview']);
            Route::get('/application-letter-edit', [JobController::class, 'applicationLetterEdit']);
            Route::get('/detail', [JobController::class, 'detail']);
            Route::post('/apply', [JobController::class, 'apply']);
            Route::get('/delete', [JobController::class, 'delete']);
        });
    });
    
    // grup account
    Route::prefix('account')->group(function () {
        Route::get('/', [AccountController::class, 'account']);
    
        // grup account_id
        Route::group(['prefix' => '{account_id}'], function () {
            Route::get('/edit', [AccountController::class, 'edit']);
            Route::put('/update', [AccountController::class, 'update']);
            Route::post('/upload-cv', [AccountController::class, 'uploadCV']);
            Route::put('/update-cv', [AccountController::class, 'updateCV']);
            Route::get('/delete-cv', [AccountController::class, 'deleteCV']);
            Route::get('/preview-cv', [AccountController::class, 'previewCV']);
            Route::post('/upload-foto', [AccountController::class, 'uploadFoto']);  
            Route::put('/update-foto', [AccountController::class, 'updateFoto']);  
            Route::get('/delete-foto', [AccountController::class, 'deleteFoto']);
            Route::get('/edit-password', [AccountController::class, 'editPassword']);
            Route::put('/update-password', [AccountController::class, 'updatePassword']);
    
            // grup education
            Route::prefix('education')->group(function () {
                Route::post('/create', [AccountController::class, 'createEducation']);    
            });
    
            // grup skill
            Route::prefix('skill')->group(function () {
                Route::post('/create', [AccountController::class, 'createSkill']);    
            });
    
            // grup experience
            Route::prefix('experience')->group(function () {
                Route::post('/create', [AccountController::class, 'createExperience']);    
            });
    
        });
    
        // grup education
        Route::prefix('education')->group(function () {
    
            // grup education_id
            Route::group(['prefix' => '{education_id}'], function () {
                Route::put('/update', [AccountController::class, 'updateEducation']);
                Route::get('/delete', [AccountController::class, 'deleteEducation']);
            });
        });
    
        // grup skill
        Route::prefix('skill')->group(function () {
    
            // grup skill_id
            Route::group(['prefix' => '{skill_id}'], function () {
                Route::put('/update', [AccountController::class, 'updateSkill']);
                Route::get('/delete', [AccountController::class, 'deleteSkill']);
            });
        });
    
        // grup experience
        Route::prefix('experience')->group(function () {
    
            // grup experience_id
            Route::group(['prefix' => '{experience_id}'], function () {
                Route::put('/update', [AccountController::class, 'updateExperience']);
                Route::get('/delete', [AccountController::class, 'deleteExperience']);
            });
        });
    
    });
    
    // grup history
    Route::prefix('history')->group(function () {
        Route::get('/', [HistoryController::class, 'history']);
    
        // grup history_id
        Route::group(['prefix' => '{history_id}'], function () {
            Route::get('/detail', [HistoryController::class, 'detail']);
            Route::get('/delete', [HistoryController::class, 'delete']);
        });
    });
});


// route middleware guest
Route::middleware(['guest'])->group(function () {

    // route auth
    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/register-action', [AuthController::class, 'registerAction']);
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login-action', [AuthController::class, 'loginAction']);
    Route::get('forgot-password', [AuthController::class, 'forgotPassword']);
    Route::post('forgot-password', [AuthController::class, 'forgotPasswordAction']);
    Route::get('reset-password/{token}', [AuthController::class, 'resetPassword']);
    Route::put('reset-password/{token}/action', [AuthController::class, 'resetPasswordAction']);

});

// route middleware auth
Route::middleware(['auth'])->group(function () {

    // route auth
    Route::get('logout', [AuthController::class, 'logout']);

    // route middleware is-admin
    Route::middleware(['is-admin'])->group(function () {

        // grup backoffice
        Route::prefix('backoffice')->group(function () {
        
            // grup dashboard
            Route::prefix('dashboard')->group(function () {
                Route::get('/', [DashboardController::class, 'dashboard']);
            });

            // grup office
            Route::prefix('office')->group(function () {
                Route::get('/', [OfficeController::class, 'office']);
                Route::put('/update', [OfficeController::class, 'update']);
            });

            // grup user
            Route::group(['prefix' => 'user'], function () {
                Route::get('/', [UserController::class, 'index']);
                Route::post('/create', [UserController::class, 'create']);

                // grup user_id
                Route::group(['prefix' => '{user_id}'], function () {
                    Route::put('/update', [UserController::class, 'update']);
                    Route::put('/update-by-admin', [UserController::class, 'updateByAdmin']);
                    Route::get('/profile', [UserController::class, 'profile']);
                    Route::get('/edit-data', [UserController::class, 'editData']);
                    Route::get('/edit-password', [UserController::class, 'editPassword']);
                    Route::post('/update-data', [UserController::class, 'updateData']);
                    Route::post('/update-password', [UserController::class, 'updatePassword']);
                    Route::get('/delete', [UserController::class, 'delete']);
                    Route::get('/preview-cv', [UserController::class, 'previewCv']);
                });

            });

            // grup vacancy
            Route::prefix('vacancy')->group(function () {
                Route::get('/', [VacancyController::class, 'vacancy']);
                Route::post('/create', [VacancyController::class, 'create']);

                // grup vacancy_id
                Route::group(['prefix' => '{vacancy_id}'], function () {
                    Route::put('/update', [VacancyController::class, 'update']);
                    Route::get('/delete', [VacancyController::class, 'delete']);
                    Route::get('/detail', [VacancyController::class, 'detail']);
                    Route::get('/document-aktif', [VacancyController::class, 'documentAktif']);
                    Route::get('/document-nonaktif', [VacancyController::class, 'documentNonaktif']);
                    Route::get('/interview-aktif', [VacancyController::class, 'interviewAktif']);
                    Route::get('/interview-nonaktif', [VacancyController::class, 'interviewNonaktif']);
                    Route::get('/training-aktif', [VacancyController::class, 'trainingAktif']);
                    Route::get('/training-nonaktif', [VacancyController::class, 'trainingNonaktif']);
                    Route::post('/schedule-interview', [VacancyController::class, 'scheduleInterview']);
                    Route::post('/schedule-training', [VacancyController::class, 'scheduleTraining']);

                    // grup skill
                    Route::prefix('skill')->group(function () {
                        Route::post('/create', [SkillController::class, 'create']);
                    });
                });
            });

            // grup job-application
            Route::prefix('job-application')->group(function () {
                
                // grup job-application_id
                Route::group(['prefix' => '{job_application_id}'], function () {
                    Route::post('/score', [VacancyController::class, 'score']);
                    Route::get('/preview-application-letter', [UserController::class, 'previewApplicationLetter']);
                    Route::get('/invite-interview', [VacancyController::class, 'inviteInterview']);
                });
            });

            // grup skill
            Route::prefix('skill')->group(function () {

                // grup skill_id
                Route::group(['prefix' => '{skill_id}'], function () {
                    Route::put('/update', [SkillController::class, 'update']);
                    Route::get('/delete', [SkillController::class, 'delete']);
                });
            });

            // grup interview
            Route::prefix('interview')->group(function () {
                Route::get('/', [InterviewController::class, 'index']);

                // grup interview_id
                Route::group(['prefix' => '{interview_id}'], function () {
                    Route::get('/detail', [InterviewController::class, 'detail']);
                    Route::post('/score', [InterviewController::class, 'score']);
                    Route::get('/invite-training', [InterviewController::class, 'inviteTraining']);
                });
            });

            // grup training
            Route::prefix('training')->group(function () {
                Route::get('/', [TrainingController::class, 'index']);

                // grup training_id
                Route::group(['prefix' => '{training_id}'], function () {
                    Route::get('/detail', [TrainingController::class, 'detail']);
                    Route::post('/score', [TrainingController::class, 'score']);
                    Route::get('/invite-qualification', [TrainingController::class, 'inviteQualification']);
                });
            });

            // grup qualification
            Route::prefix('qualification')->group(function () {
                Route::get('/', [QualificationController::class, 'index']);

                // grup qualification_id
                Route::group(['prefix' => '{qualification_id}'], function () {
                    Route::get('/detail', [QualificationController::class, 'detail']);
                });
            });

        });

    });

});
    