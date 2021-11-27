<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use DB;

class MainController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function home()
    {
        return 'Hello world !';
    }

    public function lorem()
    {
        echo 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae turpis ac urna condimentum sagittis. Morbi egestas rhoncus lectus, vel semper sem dignissim nec. Phasellus mollis augue ac vulputate congue. Integer at elit imperdiet, egestas magna sit amet, gravida lacus. Ut volutpat sem lectus, at cursus arcu sagittis ac. Donec vehicula felis vitae ipsum fermentum, sed tempus neque varius. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aenean turpis nisl, interdum sit amet sagittis quis, semper ut est. Duis sagittis sagittis urna ut maximus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis volutpat ornare condimentum.';
        
        
        echo 'Pellentesque risus urna, vulputate sit amet maximus id, viverra at ligula. Nam auctor suscipit congue. Nam convallis hendrerit lacus non ullamcorper. Nulla vitae risus vitae ligula dictum tempor cursus ut tortor. Nulla facilisi. Morbi condimentum massa eu fringilla sagittis. Praesent commodo dictum risus vel consequat. Vivamus sit amet commodo metus, a tempus sapien. Morbi eu egestas augue. Nullam arcu magna, bibendum ac gravida sit amet, dignissim in turpis. Suspendisse vel dolor eget orci dictum maximus.';
        
        
        echo 'Nunc aliquam sapien a finibus gravida. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut sit amet cursus nunc, quis eleifend nibh. Cras vel erat suscipit, tincidunt felis nec, gravida lacus. Integer id venenatis sapien, eget condimentum elit. Donec vehicula nibh quis pulvinar mollis. Donec a cursus purus. Duis congue nunc tortor, vitae maximus leo ultrices vel. Sed at ante rhoncus, ultricies nisi id, viverra nunc. Cras sit amet ultricies ex. Suspendisse tempor tempor metus. Duis eu malesuada mi. Nulla nibh risus, consequat ut velit ut, sollicitudin tempus orci. Mauris hendrerit dignissim leo ac tempor. Sed nibh lectus, rutrum vitae nibh in, sollicitudin scelerisque libero. Integer at purus sollicitudin, blandit mauris sit amet, imperdiet est.';
    }



}