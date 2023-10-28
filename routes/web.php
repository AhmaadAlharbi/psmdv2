<?php

use App\Models\Station;
use App\Http\Livewire\Faq;
use App\Http\Livewire\Blog;
use App\Http\Livewire\Chat;
use App\Http\Livewire\Flex;
use App\Http\Livewire\Mail;
use App\Http\Livewire\Tabs;
use App\Http\Livewire\Tags;
use App\Http\Livewire\About;
use App\Http\Livewire\Badge;
use App\Http\Livewire\Cards;
use App\Http\Livewire\Index;
use App\Http\Livewire\Reset;
use App\Http\Livewire\Toast;
use App\Http\Livewire\Width;
use App\Http\Livewire\Alerts;
use App\Http\Livewire\Avatar;
use App\Http\Livewire\Border;
use App\Http\Livewire\Extras;
use App\Http\Livewire\Forgot;
use App\Http\Livewire\Height;
use App\Http\Livewire\Icons1;
use App\Http\Livewire\Icons2;
use App\Http\Livewire\Icons3;
use App\Http\Livewire\Icons4;
use App\Http\Livewire\Icons5;
use App\Http\Livewire\Icons6;
use App\Http\Livewire\Icons7;
use App\Http\Livewire\Icons8;
use App\Http\Livewire\Icons9;
use App\Http\Livewire\Images;
use App\Http\Livewire\Margin;
use App\Http\Livewire\Modals;
use App\Http\Livewire\Rating;
use App\Http\Livewire\Search;
use App\Http\Livewire\Signin;
use App\Http\Livewire\Signup;
use App\Http\Livewire\Buttons;
use App\Http\Livewire\Display;
use App\Http\Livewire\Gallery;
use App\Http\Livewire\Icons10;
use App\Http\Livewire\Icons11;
use App\Http\Livewire\Icons12;
use App\Http\Livewire\Invoice;
use App\Http\Livewire\Padding;
use App\Http\Livewire\Popover;
use App\Http\Livewire\Pricing;
use App\Http\Livewire\Profile;
use App\Http\Livewire\Tooltip;
use App\Http\Livewire\Widgets;
use App\Http\Livewire\Calendar;
use App\Http\Livewire\Carousel;
use App\Http\Livewire\CheckOut;
use App\Http\Livewire\Collapse;
use App\Http\Livewire\Contacts;
use App\Http\Livewire\Counters;
use App\Http\Livewire\Dropdown;
use App\Http\Livewire\EditPost;
use App\Http\Livewire\Error404;
use App\Http\Livewire\Error500;
use App\Http\Livewire\Error501;
use App\Http\Livewire\MailRead;
use App\Http\Livewire\Position;
use App\Http\Livewire\Products;
use App\Http\Livewire\Progress;
use App\Http\Livewire\Settings;
use App\Http\Livewire\Spinners;
use App\Http\Livewire\Timeline;
use App\Http\Livewire\Todotask;
use App\Http\Livewire\Treeview;
use App\Http\Livewire\Userlist;
use App\Http\Livewire\WishList;
use App\Http\Livewire\Accordion;
use App\Http\Livewire\ChartFlot;
use App\Http\Livewire\EditTable;
use App\Http\Livewire\Emptypage;
use App\Http\Livewire\FormSizes;
use App\Http\Livewire\ListGroup;
use App\Http\Livewire\MapVector;
use App\Http\Livewire\Scrollspy;
use App\Http\Livewire\Switcher1;
use App\Http\Livewire\TableData;
use App\Http\Livewire\Background;
use App\Http\Livewire\ChartPeity;
use App\Http\Livewire\FormEditor;
use App\Http\Livewire\Lockscreen;
use App\Http\Livewire\MapLeaflet;
use App\Http\Livewire\Navigation;
use App\Http\Livewire\Pagination;
use App\Http\Livewire\SweetAlert;
use App\Http\Livewire\TableBasic;
use App\Http\Livewire\Thumbnails;
use App\Http\Livewire\Typography;
use App\Http\Livewire\BlogDetails;
use App\Http\Livewire\Breadcrumbs;
use App\Http\Livewire\ChartEchart;
use App\Http\Livewire\ChartMorris;
use App\Http\Livewire\Editprofile;
use App\Http\Livewire\FileManager;
use App\Http\Livewire\FormLayouts;
use App\Http\Livewire\FormWizards;
use App\Http\Livewire\MailCompose;
use App\Http\Livewire\MediaObject;
use App\Http\Livewire\ProductCart;
use App\Http\Livewire\Rangeslider;
use App\Http\Livewire\ChartChartjs;
use App\Http\Livewire\FormAdvanced;
use App\Http\Livewire\FormElements;
use App\Http\Livewire\ImageCompare;
use App\Http\Livewire\MailSettings;
use App\Http\Livewire\Notification;
use App\Http\Livewire\ChartSparkline;
use App\Http\Livewire\Draggablecards;
use App\Http\Livewire\FormValidation;
use App\Http\Livewire\ProductDetails;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\FileAttachments;
use App\Http\Livewire\FileManagerList;
use App\Http\Controllers\FileController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Underconstruction;
use App\Http\Livewire\FileManagerDetails;
use App\Http\Livewire\WidgetNotification;
use App\Http\Controllers\StationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EngineersController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', function () {
    return view('livewire.signin');
});
Route::get('about', About::class);
Route::get('accordion', Accordion::class);
Route::get('alerts', Alerts::class);
Route::get('avatar', Avatar::class);
Route::get('background', Background::class);
Route::get('badge', Badge::class);
Route::get('blog-details', BlogDetails::class);
Route::get('blog', Blog::class);
Route::get('border', Border::class);
Route::get('breadcrumbs', Breadcrumbs::class);
Route::get('buttons', Buttons::class);
Route::get('calendar', Calendar::class);
Route::get('cards', Cards::class);
Route::get('carousel', Carousel::class);
Route::get('chart-chartjs', ChartChartjs::class);
Route::get('chart-echart', ChartEchart::class);
Route::get('chart-flot', ChartFlot::class);
Route::get('chart-morris', ChartMorris::class);
Route::get('chart-peity', ChartPeity::class);
Route::get('chart-sparkline', ChartSparkline::class);
Route::get('chat', Chat::class);
Route::get('check-out', CheckOut::class);
Route::get('collapse', Collapse::class);
Route::get('contacts', Contacts::class);
Route::get('counters', Counters::class);
Route::get('display', Display::class);
Route::get('draggablecards', Draggablecards::class);
Route::get('dropdown', Dropdown::class);
Route::get('edit-post', EditPost::class);
Route::get('edit-table', EditTable::class);
Route::get('editprofile', Editprofile::class);
Route::get('emptypage', Emptypage::class);
Route::get('error404', Error404::class);
Route::get('error500', Error500::class);
Route::get('error501', Error501::class);
Route::get('extras', Extras::class);
Route::get('faq', Faq::class);
Route::get('file-attachments', FileAttachments::class);
Route::get('file-manager-details', FileManagerDetails::class);
Route::get('file-manager-list', FileManagerList::class);
Route::get('file-manager', FileManager::class);
Route::get('flex', Flex::class);
Route::get('forgot', Forgot::class);
Route::get('form-advanced', FormAdvanced::class);
Route::get('form-editor', FormEditor::class);
Route::get('form-elements', FormElements::class);
Route::get('form-layouts', FormLayouts::class);
Route::get('form-sizes', FormSizes::class);
Route::get('form-validation', FormValidation::class);
Route::get('form-wizards', FormWizards::class);
Route::get('gallery', Gallery::class);
Route::get('height', Height::class);
Route::get('icons-1', Icons1::class);
Route::get('icons-2', Icons2::class);
Route::get('icons-3', Icons3::class);
Route::get('icons-4', Icons4::class);
Route::get('icons-5', Icons5::class);
Route::get('icons-6', Icons6::class);
Route::get('icons-7', Icons7::class);
Route::get('icons-8', Icons8::class);
Route::get('icons-9', Icons9::class);
Route::get('icons-10', Icons10::class);
Route::get('icons-11', Icons11::class);
Route::get('icons-12', Icons12::class);
Route::get('image-compare', ImageCompare::class);
Route::get('images', Images::class);
Route::get('index', Index::class);
Route::get('invoice', Invoice::class);
Route::get('list-group', ListGroup::class);
Route::get('lockscreen', Lockscreen::class);
Route::get('mail-compose', MailCompose::class);
Route::get('mail-read', MailRead::class);
Route::get('mail-settings', MailSettings::class);
Route::get('mail', Mail::class);
Route::get('map-leaflet', MapLeaflet::class);
Route::get('map-vector', MapVector::class);
Route::get('margin', Margin::class);
Route::get('media-object', MediaObject::class);
Route::get('modals', Modals::class);
Route::get('navigation', Navigation::class);
Route::get('notification', Notification::class);
Route::get('padding', Padding::class);
Route::get('pagination', Pagination::class);
Route::get('popover', Popover::class);
Route::get('position', Position::class);
Route::get('pricing', Pricing::class);
Route::get('product-cart', ProductCart::class);
Route::get('product-details', ProductDetails::class);
Route::get('products', Products::class);
Route::get('profile', Profile::class);
Route::get('progress', Progress::class);
Route::get('rangeslider', Rangeslider::class);
Route::get('rating', Rating::class);
Route::get('reset', Reset::class);
Route::get('scrollspy', Scrollspy::class);
Route::get('search', Search::class);
Route::get('settings', Settings::class);
Route::get('signin', Signin::class);
Route::get('signup', Signup::class);
Route::get('spinners', Spinners::class);
Route::get('sweet-alert', SweetAlert::class);
Route::get('switcher-1', Switcher1::class);
Route::get('table-basic', TableBasic::class);
Route::get('table-data', TableData::class);
Route::get('tabs', Tabs::class);
Route::get('tags', Tags::class);
Route::get('thumbnails', Thumbnails::class);
Route::get('timeline', Timeline::class);
Route::get('toast', Toast::class);
Route::get('todotask', Todotask::class);
Route::get('tooltip', Tooltip::class);
Route::get('treeview', Treeview::class);
Route::get('typography', Typography::class);
Route::get('underconstruction', Underconstruction::class);
Route::get('userlist', Userlist::class);
Route::get('widget-notification', WidgetNotification::class);
Route::get('widgets', Widgets::class);
Route::get('width', Width::class);
Route::get('wish-list', WishList::class);






// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'isAdmin'])->group(function () {
    // Add routes that require role_id = 2 here
    Route::get('/dashboard/admin', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('auth');
    Route::get('/dashboard/admin/stations', [StationController::class, 'index'])->name('stations.index');
    Route::get('/dashboard/admin/stations/{control}', [StationController::class, 'indexControl'])->name('station.indexControl');
    Route::get('/dashboard/stations/create', [StationController::class, 'create'])->name('stations.create');
    Route::get('/stations/{station}/edit', [StationController::class, 'edit'])->name('stations.edit');
    Route::put('/stations/{station}', [StationController::class, 'update'])->name('stations.update');
    Route::delete('/stations/{station}', [StationController::class, 'destroy'])->name('stations.destroy');
    Route::post('/dashboard/stations', [StationController::class, 'store'])->name('stations.store');
    Route::get('/dashboard/admin/{control}', [DashboardController::class, 'indexControl'])->name('dashboard.indexControl')->middleware('auth');
    Route::get('/add-task', [DashboardController::class, 'add_task'])->name('dashboard.add_task');
    Route::get('/engineers-list', [EngineersController::class, 'engineersList'])->name('dashboard.engineersList');
    Route::get('engineer-profile/{eng_id}', [EngineersController::class, 'engineerProfile'])->name('dashboard.engineerProfile');
    Route::get('/admin/reports/pending-approval', [DashboardController::class, 'pendingReports'])->name('dashboard.pendingReports');
    Route::get('/admin/dashboard/pending-users', [DashboardController::class, 'pendingUsers'])->name('dashboard.pendingUsers');
    Route::post('admin/dashboard/reports/approve/{id}', [DashboardController::class, 'approveReports'])->name('dashboard.approveReports');
    Route::get('/task/edit/{id}', [DashboardController::class, 'editTask'])->name('dashboard.editTask');
    Route::get('/update/user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('engineers-list/update/{id}', [EngineersController::class, 'toggleEngineer'])->name('engineerList.toggle');
    Route::get('/view/{main_task_id}/{file}', [FileController::class, 'view'])->name('view.file');
    Route::post('/convert-tasks/{id}', [DashboardController::class, 'convertTask'])->name('dashboard.convertTask');
    Route::get('/engineer/{id}/edit', [EngineersController::class, 'edit'])->name('engineer.edit');
    Route::put('/engineer/update/{id}', [EngineersController::class, 'update'])->name('engineer.update');
    Route::patch('/activate-users', [UserController::class, 'activateUsers'])->name('update.users');
    Route::delete('/tasks/{id}/delete', [DashboardController::class, 'destroy'])->name('task.destroy');
    Route::delete('/section-tasks/{id}/delete', [DashboardController::class, 'destroySectionTasks'])->name('sectionTasks.destroy');
    Route::get('/users-list', [UserController::class, 'usersList'])->name('dashboard.usersList');
    Route::post('/dashboard/admin/add-engineer', [EngineersController::class, 'addEngineer'])->name('addEngineer');
    Route::delete('/delete-converted-task/{id}', [DashboardController::class, 'deleteConvertedTask'])->name('dashboard.deleteConvertedTask');
    Route::delete('/cancel-converted-task/{id}', [DashboardController::class, 'cancelConvertedTask'])->name('dashboard.cancelConvertedTask');
    Route::get('/set/user-to-admin/{id}', [UserController::class, 'setAdmin'])->name('setAdmin');
});

Route::middleware(['auth', 'confirmed'])->group(function () {
    Route::get('/dashboard/user', [DashboardController::class, 'userIndex'])->name('dashboard.userIndex');
    Route::get('/engineer-task-page/{task}', [DashboardController::class, 'engineerTaskPage'])->name('dashboard.engineerTaskPage');
    Route::post('/submit-engineer-report/{id}', [DashboardController::class, 'submitEngineerReport'])->name('dashboard.submitEngineerReport');
    Route::get('/report-page/{id}', [DashboardController::class, 'reportPage'])->name('dashboard.reportPage');
    Route::get('/report-page/{main_task_id}/{department_id}', [DashboardController::class, 'reportDepartment'])->name('dashboard.reportDepartment');
    Route::get('/tasks/{status}', [DashboardController::class, 'showTasks'])->name('dashboard.showTasks');
    Route::get('/search/station', [DashboardController::class, 'searchStation'])->name('dashboard.searchStation');
    Route::get('/search/engineer-tasks', [DashboardController::class, 'engineerTasks'])->name('dashboard.engineerTasks');
    Route::get('engineer/{id}/tasks/{status}', [EngineersController::class, 'engineerTask'])->name('dashboard.engineerTask');
    Route::get('/archive', [DashboardController::class, 'archive'])->name('dashboard.archive');
    Route::get('/archive/search', [DashboardController::class, 'searchArchive'])->name('dashboard.searchArchive');
    Route::get('/contact', [DashboardController::class, 'contactPage'])->name('contactPage');
    Route::post('/contact', [DashboardController::class, 'sendEmail'])->name('sendEmail');
});


Route::get('/unapproved-access', function () {
    return view('waiting-approval');
})->name('unapproved.access');

Route::get('/logout2', [EngineersController::class, 'logout'])->name('engineer.logout');

Route::get('/dashboard/admin/timeline/{id}', [DashboardController::class, 'timeline'])->name('dashboard.timeline');
Route::get('/dashbaord/user/engineer-tasks/{status}', [DashboardController::class, 'ShowTasksEngineer'])->name('dashboard.ShowTasksEngineer');
Route::get('/dashboard/user/request-to-update-report/{main_task_id}', [DashboardController::class, 'requestToUpdateReport'])->name('dashboard.requestToUpdateReport');
Route::patch('/dashboard/user/update-report/{main_task_id}', [DashboardController::class, 'updateReport'])->name('dashboard.updateReport');
Route::get('/download/{main_task_id}/{file}', [FileController::class, 'download'])->name('download.file');
Route::get('/delete/{main_task_id}/{file}/{id}', [FileController::class, 'delete'])->name('delete.file');
Route::get('/dashbaord/view-task/{id}', [DashboardController::class, 'viewTask'])->name('dashboard.viewTask');
Route::get('/unauthorized', function () {
    return view('unauthorized');
})->name('unauthorized');



////##### statins list  
require __DIR__ . '/auth.php';
