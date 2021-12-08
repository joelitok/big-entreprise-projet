<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SliderController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;

//import use
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\AdminShopController;
use App\Http\Controllers\AdminSpaceClientController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderController;

use App\Http\Controllers\PdfController;
use App\Http\Controllers\AdminSaleController;
use App\Http\Controllers\ProductAttachController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\VisitorController;
use Illuminate\Support\Facades\Auth;



//import use

use App\Http\Controllers\UserController;
use App\Http\Controllers\RessourceController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ParametrageController;


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

// Route::get('/', function () {
//     return view('welcome');
// });


//pour le client
Route::get('/', [ClientController::class, 'home']);
Route::get('/contact', [ClientController::class, 'contact']);
Route::post('/contact-us', [ContactController::class, 'ContactUsForm']);

Route::get('/services_client', [ClientController::class, 'services']);
Route::get('/about', [ClientController::class, 'about']);
Route::get('/blog', [ClientController::class, 'blog']);
Route::get('/detail_service/{id}', [ClientController::class, 'detail_service']);
Route::get('details/{idClient}', [ClientController::class, 'gotoDetails']);

Route::get('/login2', [ClientController::class, 'login2']);
Route::get('/signup2', [ClientController::class, 'signup2']);
Route::post('/add_account', [ClientController::class, 'add_account']);
Route::post('/signin_account', [ClientController::class, 'signin_account']);
Route::get('/logout', [ClientController::class, 'client_logout']);
Route::get('/product_attaches_client', [ClientController::class, 'product_attaches']);
Route::get('/detail_product_attache/{id}', [ClientController::class, 'detail_product_attache']);


Route::get('/voir_pdf/{id}/{client_id}', [PdfController::class, 'voir_pdf']);



//pour la boutique cote client
//Route::get('/shop', [ShopController::class, 'shop']);


Route::get('/shop_full', [ShopController::class, 'shop']);

Route::get('/add_to_caddy/{id}', [ShopController::class, 'add_product_to_caddy']);
Route::get('/caddy', [ShopController::class, 'caddy']);
Route::get('/delete_product_to_caddy/{id}', [ShopController::class, 'delete_product_to_caddy']);
Route::get('/detail_shop/{id}', [ShopController::class, 'detail_product']);
Route::post('/update_quantity_product/{id}', [ShopController::class, 'update_quantity_product']);
Route::get('/search', [ShopController::class, 'search_product']);

Route::get('/select_by_category/{category_name}', [ShopController::class, 'select_by_category']);



Auth::routes();
Route::group(['middleware' => ['AuthCheck']], function () {

//pour les produires
Route::get('/products', [ProductController::class, 'product']);
Route::get('/product_add', [ProductController::class, 'product_add']);
Route::post('/product_add_save', [ProductController::class, 'product_add_save']);
Route::get('/list_product', [ProductController::class, 'list_product']);
Route::get('/desactiverproduct/{id}', [ProductController::class, 'desactiverproduct']);
Route::get('/activerproduct/{id}', [ProductController::class, 'activerproduct']);
Route::get('/delete_product/{id}', [ProductController::class, 'delete_product']);
Route::get('/product_update_save/{id}', [ProductController::class, 'product_update_save']);
Route::post('/product_update_save_action', [ProductController::class, 'product_update_save_action']);

//gestion des user
Route::get('/users', [UserController::class, 'index']);
Route::get('/add_users', [UserController::class, 'create']);
Route::post('/store_user', [UserController::class, 'store']);
Route::post('/store_role', [RoleController::class, 'store']);
Route::post('/store_ressource', [RessourceController::class, 'store']);
Route::get('/user_role/{user}', [UserController::class, 'getUserRoles'])->name("addRole");
Route::post('/affecter', [UserController::class, 'affecter'])->name("affecter");


//pour les categories
Route::get('/categories', [CategoryController::class, 'category']);
Route::get('/category_add', [CategoryController::class, 'category_add']);
Route::post('/category_add_save', [CategoryController::class, 'category_add_save']);
Route::get('/list_category', [CategoryController::class, 'list_category']);
Route::get('/desactivercategory/{id}', [CategoryController::class, 'desactivercategory']);
Route::get('/activercategory/{id}', [CategoryController::class, 'activercategory']);
Route::get('/delete_category/{id}', [CategoryController::class, 'delete_category']);
Route::get('/category_update_save/{id}', [CategoryController::class, 'category_update_save']);
Route::post('/category_update_save_action', [CategoryController::class, 'category_update_save_action']);


//pour slider
Route::get('/sliders', [SliderController::class, 'sliders']);
Route::get('/slider_add', [SliderController::class, 'slider_add']);
Route::post('/slider_add_save', [SliderController::class, 'slider_add_save']);
Route::get('/slider_list', [SliderController::class, 'slider_list']);
Route::get('/desactiverslider/{id}', [SliderController::class, 'desactiverslider']);
Route::get('/activerslider/{id}', [SliderController::class, 'activerslider']);
Route::get('/delete_slider/{id}', [SliderController::class, 'delete_slider']);
Route::get('/slider_update_save/{id}', [SliderController::class, 'slider_update_save']);
Route::post('/slider_update_save_action', [SliderController::class, 'slider_update_save_action']);
Route::post("save_champ_devis_service/{serviceId}", [ServiceController::class, 'saveChampDevis']);


//pour l'administrateur
Route::get('/admin', [AdminController::class, 'admin'])->name("admin");
Route::get('/client_list', [AdminController::class, 'client_list']);
Route::get('/client_add', [AdminController::class, 'client_add']);
Route::post('/client_add_save', [AdminController::class, 'add_account']);
Route::get('/desactiveruser_a/{id}', [AdminController::class, 'desactiveruser']);
Route::get('/activeruser_a/{id}', [AdminController::class, 'activeruser']);
Route::get('/desactiverclient_a/{id}', [AdminController::class, 'desactiverclient']);
Route::get('/activerclient_a/{id}', [AdminController::class, 'activerclient']);
Route::get('/delete_client_a/{id}', [AdminController::class, 'delete_client']);
Route::get('/delete_user_a/{id}', [AdminController::class, 'delete_user']);
Route::get('/list_order_a', [AdminController::class, 'list_order']);
Route::get('/transfer_a/{id}', [AdminController::class, 'transferToDelivery']);
Route::get('/admin_profile', [ProfilesController::class, 'profile']);
Route::post('/change_statut', [OrderController::class, 'changeStatutCommande']);
Route::get('add_image_bill/{order}', [OrderController::class, 'gotoAddImage']);
Route::post('/storeImage', [OrderController::class, 'storeImage']);


// pour la boutique coté administrateur
Route::get('/products_a', [AdminController::class, 'product']);
Route::get('/product_add_a', [AdminController::class, 'product_add']);
Route::post('/product_add_save_a', [AdminController::class, 'product_add_save']);
Route::get('/list_product_a', [AdminController::class, 'list_product']);
Route::get('/desactiverproduct_a/{id}', [AdminController::class, 'desactiverproduct']);
Route::get('/activerproduct_a/{id}', [AdminController::class, 'activerproduct']);
Route::get('/delete_product_a/{id}', [AdminController::class, 'delete_product']);
Route::get('/product_update_save_a/{id}', [AdminController::class, 'product_update_save']);
Route::post('/product_update_save_action_a', [AdminController::class, 'product_update_save_action']);
//Route::get('/admin_shop', [AdminController::class,'admin_shop']);


//pour le gestionnaire des prix de zone
Route::get('/list_zone', [AdminController::class, 'list_zone']);
Route::get('/zone_add', [AdminController::class, 'zone_add']);
Route::post('/zone_add_save', [AdminController::class, 'zone_add_save']);
Route::get('/delete_zone/{id}', [AdminController::class, 'delete_zone']);


//pour le gestionnaire des villes
Route::get('/list_city', [AdminController::class, 'list_city']);
Route::get('/city_add', [AdminController::class, 'city_add']);
Route::post('/city_add_save', [AdminController::class, 'city_add_save']);
Route::get('/delete_city/{id}', [AdminController::class, 'delete_city']);

//pour le gestionnaire des villes
Route::get('/list_quatar', [AdminController::class, 'list_quatar']);
Route::get('/quatar_add', [AdminController::class, 'quatar_add']);
Route::post('/quatar_add_save', [AdminController::class, 'quatar_add_save']);
Route::get('/delete_quatar/{id}', [AdminController::class, 'delete_quatar']);

//envoie des newsletter
Route::get('/newsletter_add', [NewsLetterController::class, 'newsletter_data_add']);
Route::post('/newslet_add_save', [NewsLetterController::class, 'newslet_add_save']);
Route::get('/list_newsletter', [NewsLetterController::class, 'newsletter_list']);
Route::get('/delete_newsletter/{id}', [NewsLetterController::class, 'delete_newsletter']);
Route::post('/newsletter', [NewsLetterController::class, 'newsletter_add_save']);

Route::get('list_visitor',[VisitorController::class, 'list_visitor']);
Route::get('delete_visitor/{id}',[VisitorController::class, 'delete_visitor']);

//pour services
Route::get('/services', [ServiceController::class, 'service']);
Route::get('/service_add', [ServiceController::class, 'service_add']);
Route::post('/service_add_save', [ServiceController::class, 'service_add_save']);
Route::get('/service_list', [ServiceController::class, 'service_list']);
Route::get('/desactiverservice/{id}', [ServiceController::class, 'desactiverservice']);
Route::get('/activerservice/{id}', [ServiceController::class, 'activerservice']);
Route::get('/delete_service/{id}', [ServiceController::class, 'delete_service']);
Route::get('/service_update_save/{id}', [ServiceController::class, 'service_update_save']);
Route::post('/service_update_save_action', [ServiceController::class, 'service_update_save_action']);



Route::get('/home', [AdminController::class, 'admin'])->name("admin");

Route::get('role_ressource/{role}', [RoleController::class, 'getRoleRessources'])->name('addRessource');
Route::get('admin/updateUser/{user}', [UserController::class, 'edit'])->name("adminEditUser");
Route::post('admin/updateUser/{id}', [UserController::class, 'update'])->name("adminUpdateUser");
Route::post('affecterRessource', [RoleController::class, 'affecter'])->name("affecterRessource");
Route::get('cout_sup', [ParametrageController::class, 'index']);
Route::post('store_param', [ParametrageController::class, 'store']);
Route::post('store_grammage', [ParametrageController::class, 'storeGrammage']);
Route::post('store_niveau', [ParametrageController::class, 'storeEncombrement']);

Route::get("init", [ServiceController::class, 'initInfos']);


//get devis form
Route::get('/devis_form/{id?}',[ServiceController::class,'devis_form']);
Route::post('/devis_add_save',[ServiceController::class,'devis_form_data']);


//pour le livreur
Route::get('/list_orders', [DeliveryController::class, 'list_orders']);
Route::get('/order_detail/{id}', [DeliveryController::class, 'order_detail']);
Route::get('/delivery', [DeliveryController::class, 'delivery']);
Route::get('/delivery_profile', [ProfilesController::class, 'profile']);
Route::get('/transfer_d/{id}', [DeliveryController::class, 'transferToDelivery']);

//pour le gestionnaire de vente
Route::get('/list_orders_sale', [AdminSaleController::class, 'list_orders']);
Route::get('/order_detail_sale/{id}', [AdminSaleController::class, 'order_detail']);
Route::get('/admin_sale', [AdminSaleController::class, 'admin_sale']);
Route::get('/admin_sale_profile', [ProfilesController::class, 'profile']);
Route::get('/transfer__sale/{id}', [AdminSaleController::class, 'transferToDelivery']);

//pour le admin shop
Route::get('/admin_shop_profile', [ProfilesController::class, 'profile']);
Route::get('/orders', [AdminShopController::class, 'orders']);
Route::get('/myOrder_admin_shop_detail/{id}', [AdminShopController::class, 'order_detail']);
Route::get('/transfer_s/{id}', [AdminShopController::class, 'transferToDelivery']);




});









//pour le client
Route::get('/my_order', [AdminSpaceClientController::class, 'my_order']);
Route::get('/history_order', [AdminSpaceClientController::class, 'history_order']);
Route::get('/order_tracker', [AdminSpaceClientController::class, 'order_tracker']);
Route::get('/client_profile', [AdminSpaceClientController::class, 'client_profile']);
Route::get('/order_facture', [AdminSpaceClientController::class, 'order_facture']);


//payement controller
Route::get('/payment', [PaymentController::class, 'payment']);
Route::post('/payment_order_save', [OrderController::class, 'payment_order_save']);
Route::get('/payment-complete', [PaymentController::class, 'paymentcomplete']);


//route pour ajouter un nouveau produits attache a la structure
Route::get('/product_attach_add', [ProductAttachController::class, 'product_attach_add']);
Route::post('/product_attach_add_save', [ProductAttachController::class, 'product_attach_add_save']);
Route::get('/product_attach_list', [ProductAttachController::class, 'product_attach_list']);
Route::get('/disable_product_attach/{id}', [ProductAttachController::class, 'disable_product_attach']);
Route::get('/enable_product_attach/{id}', [ProductAttachController::class, 'enable_product_attach']);
Route::get('/delete_product_attach/{id}', [ProductAttachController::class, 'delete_product_attach']);
Route::get('/product_attach_update_save/{id}', [ProductAttachController::class, 'product_attach_update_save']);
Route::post('/product_attach_update_save_action', [ProductAttachController::class, 'product_attach_update_save_action']);

//product
Route::view('shop-full-v/{id?}', 'livewire.product');


