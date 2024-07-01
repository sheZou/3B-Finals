    <?php

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\StudentController;

    // Routes for students
    Route::get('/students', [StudentController::class, 'index']);        // GET /api/students
    Route::post('/students', [StudentController::class, 'store']);       // POST /api/students
    Route::get('/students/{id}', [StudentController::class, 'show']);    // GET /api/students/{id}
    Route::patch('/students/{id}', [StudentController::class, 'update']); // PATCH /api/students/{id}

    use App\Http\Controllers\SubjectController;

    Route::prefix('students/{id}')->group(function () {
        Route::get('/subjects', [SubjectController::class, 'index']);
        Route::post('/subjects', [SubjectController::class, 'store']);
        Route::get('/subjects/{subject_id}', [SubjectController::class, 'show']);
        Route::patch('/subjects/{subject_id}', [SubjectController::class, 'update']);
    });