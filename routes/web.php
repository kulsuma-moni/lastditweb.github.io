<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\BatchController;
use App\Http\Controllers\Admin\BlogcateController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\DivisionController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\FreelancerController;
use App\Http\Controllers\Admin\EntrepreneurController;
use App\Http\Controllers\Admin\PortfoliocateController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\EditorController;
use App\Http\Controllers\Admin\CareerController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\User\ProjectController;
use App\Http\Controllers\User\BlogcommentController;
use App\Http\Controllers\StudentController;



/*
|
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/layouts', function () {
    return view('admin.layouts.app');
});
Route::get('/linksss', function () {
    Artisan::call('migrate');
    return 'success';
});

Route::get('/team', function () {
    return view('team')->name('team');
});
Route::get('/software', function () {
    return view('software');
});
Route::get('/newcourses', function () {
    return view('newcourses');
});
Route::get('/streview', function () {
    return view('streview');
});


Route::get('/home', [PublicController::class, 'index'])->name('/');
Route::get('/', [PublicController::class, 'index'])->name('/');
Route::get('/admission-form', [PublicController::class, 'admissionForm'])->name('admission.form');
Route::get('/about', [PublicController::class, 'about'])->name('about');
Route::get('/ceo', [PublicController::class, 'ceo'])->name('ceo');

Route::get('/courses', [PublicController::class, 'courses'])->name('courses');
Route::get('/course/{course}', [PublicController::class, 'courseSingle'])->name('single.course');

Route::get('/freelancers', [PublicController::class, 'freelancers'])->name('freelancers');
Route::get('/freelancer/{freelancer}', [PublicController::class, 'freelancerSingle'])->name('single.freelancer');

Route::get('/careers', [PublicController::class, 'careers'])->name('careers');
Route::get('/career/{career}', [PublicController::class, 'careerSingle'])->name('single.career');

Route::get('/entrepreneurs', [PublicController::class, 'entrepreneurs'])->name('entrepreneurs');
Route::get('/entrepreneur/{entrepreneur}', [PublicController::class, 'entrepreneurSingle'])->name('single.entrepreneur');

Route::get('/portfolios', [PublicController::class, 'portfolios'])->name('portfolios');
Route::get('/services', [PublicController::class, 'services'])->name('services');
Route::get('/services/{service}', [PublicController::class, 'serviceSingle'])->name('single.service');
Route::get('/addmission-procedure', [PublicController::class, 'addmissionProcedure'])->name('addmission.procedure');

Route::get('/blogs', [PublicController::class, 'blogs'])->name('blogs');
Route::get('/all-blogs', [PublicController::class, 'latestBlogs'])->name('latest.blogs');
Route::get('/archieve-month/{achieve}', [PublicController::class, 'archieveMonth'])->name('archieve.month');


Route::get('/team-member', [PublicController::class, 'team'])->name('team');


Route::get('/blogs/{blogcate}', [PublicController::class, 'categoryBlogs'])->name('category.blogs');
Route::get('/blog/{blog}', [PublicController::class, 'singleBlog'])->name('single.blog');

Route::get('/contact', [PublicController::class, 'contact'])->name('contact');
Route::post('/create-new-contact', [PublicController::class, 'createContact'])->name('create.contact');

Route::get('/start-a-project', [ProjectController::class, 'startProject'])->name('start.project');
Route::post('/start-a-new-project', [ProjectController::class, 'createnewProject'])->name('start.new.project');



Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
Route::get('/shop', [PublicController::class, 'shop'])->name('shop');
Route::post('/search-result', [PublicController::class, 'search'])->name('search');
Auth::routes();

//EDITORS ROUTE
Route::get('/user-profile', [EditorController::class, 'profile'])->name('user.profile');
Route::get('/add-profile', [EditorController::class, 'create'])->name('create.userdetail');
Route::post('/store-profile', [EditorController::class, 'store'])->name('store.userdetail');
Route::post('/update-profile/{userdetail}', [EditorController::class, 'update'])->name('update.userdetail');


Route::middleware(['auth'])->group(function () {

Route::get('/career-apply-form-{career}', [PublicController::class, 'careerApply'])->name('career.apply');
Route::post('/career-apply-now', [PublicController::class, 'careerApplication'])->name('career.application');

//COMMENT FOR BLOG
Route::post('/blog-comment', [BlogcommentController::class, 'store'])->name('blog.comment');
Route::get('/blog-comment-delete/{blogcomment}', [BlogcommentController::class, 'delete'])->name('blog.comment.delete');




Route::middleware(['auth', 'editor'])->group(function () {


Route::middleware(['auth', 'admin'])->group(function () {


	//EDITOR ROUTES
	Route::get('/list-editor', [EditorController::class, 'index'])->name('index.editor');
	Route::get('/create-editor', [EditorController::class, 'create'])->name('create.editor');
	Route::post('/store-editor', [EditorController::class, 'store'])->name('store.editor');
	Route::get('/edit-editor/{user}', [EditorController::class, 'edit'])->name('edit.editor');
	Route::post('/update-editor/{user}', [EditorController::class, 'update'])->name('update.editor');
	Route::get('/delete-editor/{user}', [EditorController::class, 'delete'])->name('delete.editor');
	Route::get('/active-editor/{user}', [EditorController::class, 'active'])->name('active.editor');
	Route::get('/deactive-editor/{user}', [EditorController::class, 'deactive'])->name('deactive.editor');
	Route::get('/deactive-editor-list', [EditorController::class, 'newEditors'])->name('deactive.editor.list');


    //EDITORS ROUTE
	Route::get('/new-eidor-list', [StudentController::class, 'appliedStudent'])->name('applied.student');

    //STUDENT ROUTES
	Route::get('/applied-student', [StudentController::class, 'appliedStudent'])->name('applied.student');
	Route::get('/active-student', [StudentController::class, 'activeStudent'])->name('active.student');

	// Route::get('/create-student', [StudentController::class, 'create'])->name('create.student');
	Route::post('/store-student', [StudentController::class, 'store'])->name('store.student');
	Route::get('/info-student/{student}', [StudentController::class, 'info'])->name('info.student');
	Route::post('/confirm-student/{student}', [StudentController::class, 'confirmStudent'])->name('confirm.student');
	Route::post('/pay-student/{student}', [StudentController::class, 'payStudent'])->name('pay.student');
	Route::get('/payment-information/{student}', [StudentController::class, 'paymentInfo'])->name('payment.info');
	
	Route::get('/edit-student/{student}', [StudentController::class, 'edit'])->name('edit.student');
	Route::post('/update-student/{student}', [StudentController::class, 'update'])->name('update.student');
	Route::get('/delete-student/{student}', [StudentController::class, 'delete'])->name('delete.student');
	// Route::get('/active-student/{student}', [StudentController::class, 'active'])->name('active.student');
	// Route::get('/deactive-student/{student}', [StudentController::class, 'deactive'])->name('deactive.student');
	// Route::get('/deactive-student-list', [StudentController::class, 'deactiveList'])->name('deactive.student.list');

    //COURSES ROUTES
	Route::get('/list-course', [CourseController::class, 'index'])->name('index.course');
	Route::get('/create-course', [CourseController::class, 'create'])->name('create.course');
	Route::post('/store-course', [CourseController::class, 'store'])->name('store.course');
	Route::get('/edit-course/{course}', [CourseController::class, 'edit'])->name('edit.course');
	Route::post('/update-course/{course}', [CourseController::class, 'update'])->name('update.course');
	Route::get('/delete-course/{course}', [CourseController::class, 'delete'])->name('delete.course');
	Route::get('/active-course/{course}', [CourseController::class, 'active'])->name('active.course');
	Route::get('/deactive-course/{course}', [CourseController::class, 'deactive'])->name('deactive.course');
	Route::get('/deactive-course-list', [CourseController::class, 'deactiveList'])->name('deactive.course.list');

    //BATCH ROUTES
	Route::get('/list-batch', [BatchController::class, 'index'])->name('index.batch');
	Route::get('/create-batch', [BatchController::class, 'create'])->name('create.batch');
	Route::post('/store-batch', [BatchController::class, 'store'])->name('store.batch');
	Route::get('/edit-batch/{batch}', [BatchController::class, 'edit'])->name('edit.batch');
	Route::post('/update-batch/{batch}', [BatchController::class, 'update'])->name('update.batch');
	Route::get('/delete-batch/{batch}', [BatchController::class, 'delete'])->name('delete.batch');
	Route::get('/active-batch/{batch}', [BatchController::class, 'active'])->name('active.batch');
	Route::get('/deactive-batch/{batch}', [BatchController::class, 'deactive'])->name('deactive.batch');
	Route::get('/deactive-batch-list', [BatchController::class, 'deactiveList'])->name('deactive.batch.list');



	//SERVICE ROUTES
	Route::get('/list-service', [ServiceController::class, 'index'])->name('index.service');
	Route::get('/create-service', [ServiceController::class, 'create'])->name('create.service');
	Route::post('/store-service', [ServiceController::class, 'store'])->name('store.service');
	Route::get('/edit-service/{service}', [ServiceController::class, 'edit'])->name('edit.service');
	Route::post('/update-service/{service}', [ServiceController::class, 'update'])->name('update.service');
	Route::get('/delete-service/{service}', [ServiceController::class, 'delete'])->name('delete.service');
	Route::get('/active-service/{service}', [ServiceController::class, 'active'])->name('active.service');
	Route::get('/deactive-service/{service}', [ServiceController::class, 'deactive'])->name('deactive.service');
	Route::get('/deactive-service-list', [ServiceController::class, 'deactiveList'])->name('deactive.service.list');




	//CONTACT ROUTES
	Route::get('/new-counceller-list', [AdminController::class, 'newCouncellers'])->name('new.index.counceller');
	Route::get('/counceller-list', [AdminController::class, 'councellerList'])->name('index.counceller');

	Route::get('/list-contact', [AdminController::class, 'contactList'])->name('index.contact');
	Route::get('/delete-contact/{contact}', [AdminController::class, 'delete'])->name('delete.contact');
	Route::get('/active-contact/{contact}', [AdminController::class, 'active'])->name('active.contact');
	Route::get('/deactive-contact/{contact}', [AdminController::class, 'deactive'])->name('deactive.contact');
	Route::get('/deactive-contact-list', [AdminController::class, 'deactiveList'])->name('deactive.contact.list');




    //SETTING ROUTE ARE HERE
    Route::get('setting', [SettingController::class,'index'])->name('setting');
    Route::post('setting-store',[SettingController::class,'store'])->name('store.setting');
    Route::post('setting-update',[SettingController::class,'update'])->name('update.setting');


	//DIVISION ROUTES
    Route::get('/division', [DivisionController::class, 'index'])->name('admin.division');
    Route::post('/create/division', [DivisionController::class, 'create'])->name('create.division');
    Route::post('/update/division/{division}', [DivisionController::class, 'update'])->name('update.division');
    Route::get('/delete/division/{division}', [DivisionController::class, 'delete'])->name('delete.division');

    // DISTRICT ROUTES
    Route::get('/district', [DistrictController::class, 'index'])->name('admin.district');
    Route::post('/create/district', [DistrictController::class, 'create'])->name('create.district');
    Route::post('/update/district/{district}', [DistrictController::class, 'update'])->name('update.district');
    Route::get('/delete/district/{district}', [DistrictController::class, 'delete'])->name('delete.district');



	//TEAM ROUTES
    Route::get('/team', [TeamController::class, 'index'])->name('admin.team');
    Route::post('/create-team', [TeamController::class, 'create'])->name('create.team');
    Route::post('/update-team/{team}', [TeamController::class, 'update'])->name('update.team');
    Route::get('/delete-team/{team}', [TeamController::class, 'delete'])->name('delete.team');

    //FREELANCERS ROUTES
	Route::get('/list-freelancer', [FreelancerController::class, 'index'])->name('index.freelancer');
	Route::get('/create-freelancer', [FreelancerController::class, 'create'])->name('create.freelancer');
	Route::post('/store-freelancer', [FreelancerController::class, 'store'])->name('store.freelancer');
	Route::get('/edit-freelancer/{freelancer}', [FreelancerController::class, 'edit'])->name('edit.freelancer');
	Route::post('/update-freelancer/{freelancer}', [FreelancerController::class, 'update'])->name('update.freelancer');
	Route::get('/delete-freelancer/{freelancer}', [FreelancerController::class, 'delete'])->name('delete.freelancer');
	Route::get('/active-freelancer/{freelancer}', [FreelancerController::class, 'active'])->name('active.freelancer');
	Route::get('/deactive-freelancer/{freelancer}', [FreelancerController::class, 'deactive'])->name('deactive.freelancer');
	Route::get('/deactive-freelancer-list', [FreelancerController::class, 'deactiveList'])->name('deactive.freelancer.list');

    //ENTREPRENEUR ROUTES
	Route::get('/list-entrepreneur', [EntrepreneurController::class, 'index'])->name('index.entrepreneur');
	Route::get('/create-entrepreneur', [EntrepreneurController::class, 'create'])->name('create.entrepreneur');
	Route::post('/store-entrepreneur', [EntrepreneurController::class, 'store'])->name('store.entrepreneur');
	Route::get('/edit-entrepreneur/{entrepreneur}', [EntrepreneurController::class, 'edit'])->name('edit.entrepreneur');
	Route::post('/update-entrepreneur/{entrepreneur}', [EntrepreneurController::class, 'update'])->name('update.entrepreneur');
	Route::get('/delete-entrepreneur/{entrepreneur}', [EntrepreneurController::class, 'delete'])->name('delete.entrepreneur');
	Route::get('/active-entrepreneur/{entrepreneur}', [EntrepreneurController::class, 'active'])->name('active.entrepreneur');
	Route::get('/deactive-entrepreneur/{entrepreneur}', [EntrepreneurController::class, 'deactive'])->name('deactive.entrepreneur');
	Route::get('/deactive-entrepreneur-list', [EntrepreneurController::class, 'deactiveList'])->name('deactive.entrepreneur.list');


    //CAREER ROUTES
	Route::get('/list-career', [CareerController::class, 'index'])->name('index.career');
	Route::get('/create-career', [CareerController::class, 'create'])->name('create.career');
	Route::get('/view-career/{career}', [CareerController::class, 'view'])->name('view.career');
	Route::post('/store-career', [CareerController::class, 'store'])->name('store.career');
	Route::get('/edit-career/{career}', [CareerController::class, 'edit'])->name('edit.career');
	Route::post('/update-career/{career}', [CareerController::class, 'update'])->name('update.career');
	Route::get('/delete-career/{career}', [CareerController::class, 'delete'])->name('delete.career');
	Route::get('/active-career/{career}', [CareerController::class, 'active'])->name('active.career');
	Route::get('/deactive-career/{career}', [CareerController::class, 'deactive'])->name('deactive.career');
	Route::get('/deactive-career-list', [CareerController::class, 'deactiveList'])->name('deactive.career.list');


	Route::get('/delete-career-applicant/{careerapply}', [CareerController::class, 'deleteApplicant'])->name('delete.career.applicant');
	Route::get('/active-career-applicant/{careerapply}', [CareerController::class, 'activeApplicant'])->name('active.career.applicant');
	Route::get('/deactive-career-applicant/{careerapply}', [CareerController::class, 'deactiveApplicant'])->name('deactive.career.applicant');
	Route::get('/deactive-career-applicant-list', [CareerController::class, 'deactiveApplicantList'])->name('deactive.career.applicant.list');
	Route::get('/view-career-applicant/{applicant}', [CareerController::class, 'viewApplicant'])->name('view.career.applicant');


	Route::get('/career-applied-list', [CareerController::class, 'careerApplied'])->name('career.applied.list');

    

	//BLOG ROUTES
	Route::get('/list-blog', [BlogController::class, 'index'])->name('index.blog');
	Route::get('/deactive-blog-list', [BlogController::class, 'deactiveList'])->name('deactive.blog.list');

	
	Route::get('/list-portfolio', [PortfolioController::class, 'index'])->name('index.portfolio');

	Route::get('/deactive-portfolio-list', [PortfolioController::class, 'deactiveList'])->name('deactive.portfolio.list');


});




    // ALL ADMIN ROUTES
	Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');




	//PORFOLIO CATEGORY ROUTES
    Route::get('/portfoliocate', [PortfoliocateController::class, 'index'])->name('admin.portfoliocate');
    Route::post('/create/portfoliocate', [PortfoliocateController::class, 'create'])->name('create.portfoliocate');
    Route::post('/update/portfoliocate/{portfoliocate}', [PortfoliocateController::class, 'update'])->name('update.portfoliocate');
    Route::get('/delete/portfoliocate/{portfoliocate}', [PortfoliocateController::class, 'delete'])->name('delete.portfoliocate');



    //PORTFOLIOS ROUTES

	Route::get('/users-portfolio-list', [PortfolioController::class, 'portfolios'])->name('user.index.portfolio');
	Route::get('/user-deactive-portfolio-list', [PortfolioController::class, 'userdeactiveportfolio'])->name('user.deactive.portfolios');

	Route::get('/create-portfolio', [PortfolioController::class, 'create'])->name('create.portfolio');
	Route::post('/store-portfolio', [PortfolioController::class, 'store'])->name('store.portfolio');
	Route::get('/edit-portfolio/{portfolio}', [PortfolioController::class, 'edit'])->name('edit.portfolio');
	Route::post('/update-portfolio/{portfolio}', [PortfolioController::class, 'update'])->name('update.portfolio');
	Route::get('/delete-portfolio/{portfolio}', [PortfolioController::class, 'delete'])->name('delete.portfolio');
	Route::get('/active-portfolio/{portfolio}', [PortfolioController::class, 'active'])->name('active.portfolio');
	Route::get('/deactive-portfolio/{portfolio}', [PortfolioController::class, 'deactive'])->name('deactive.portfolio');





	//BLOGCATE ROUTES
    Route::get('/blogcate', [BlogcateController::class, 'index'])->name('admin.blogcate');
    Route::post('/create/blogcate', [BlogcateController::class, 'create'])->name('create.blogcate');
    Route::post('/update/blogcate/{blogcate}', [BlogcateController::class, 'update'])->name('update.blogcate');
    Route::get('/delete/blogcate/{blogcate}', [BlogcateController::class, 'delete'])->name('delete.blogcate');



	//BLOG ROUTES
	Route::get('/users-blog-list', [BlogController::class, 'blogs'])->name('user.index.blog');
	Route::get('/user-deactive-blog-list', [BlogController::class, 'userdeactiveBlog'])->name('user.deactive.blogs');

	Route::get('/create-blog', [BlogController::class, 'create'])->name('create.blog');
	Route::post('/store-blog', [BlogController::class, 'store'])->name('store.blog');
	Route::get('/edit-blog/{blog}', [BlogController::class, 'edit'])->name('edit.blog');
	Route::post('/update-blog/{blog}', [BlogController::class, 'update'])->name('update.blog');
	Route::get('/delete-blog/{blog}', [BlogController::class, 'delete'])->name('delete.blog');
	Route::get('/active-blog/{blog}', [BlogController::class, 'active'])->name('active.blog');
	Route::get('/deactive-blog/{blog}', [BlogController::class, 'deactive'])->name('deactive.blog');




Route::get('/fetch-district/{id}', [FreelancerController::class,'fetchDist']);

});
});
