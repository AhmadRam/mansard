<?php

namespace App\Http\Controllers\admin_panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductVerifyRequest;
use App\Http\Requests\ProductEditVerifyRequest;

use Illuminate\Support\Facades\DB;
use App\Product;
use App\product_attribute;
use App\Category;
use App\propertie;
use Dotenv\Loader\Value;
use Illuminate\Auth\Events\Validated;

class productsController extends Controller
{
    public function index()
    {
        $result = Product::all();

        return view('admin_panel.products.index')
            ->with('prdlist', $result);
    }

    public function create()
    {
        $result = Category::all();
        return view('admin_panel.products.create')
            ->with('catlist', $result);
    }
    public function createspa()
    {
        return view('admin_panel.products.createspa');
    }




    public function store(ProductVerifyRequest $request)
    {

        try {
            $img = explode('|', $request->img);

            for ($i = 0; $i < count($img) - 1; $i++) {

                if (strpos($img[$i], 'data:image/jpeg;base64,') === 0) {
                    $img[$i] = str_replace('data:image/jpeg;base64,', '', $img[$i]);
                    $ext = '.jpg';
                }
                if (strpos($img[$i], 'data:image/png;base64,') === 0) {
                    $img[$i] = str_replace('data:image/png;base64,', '', $img[$i]);
                    $ext = '.png';
                }

                $prd = new Product();
                $prd->image_name = "1" . $ext;
                $prd->name = $request->Name;
                $prd->name_tr = $request->NameTR;
                $prd->category_id = $request->Category;
                $prd->image_tag = $request->ImageTag;
                $prd->save();

                if ($prd->category_id == 9) {

                    $myarray = [
                        ['name' => $request->BodyscrubDescription, 'value' => $request->Bodyscrub, 'visible' => $request->visiblebs, 'product_id' => $prd->id],
                        ['name' => $request->BodyscrubDescriptionTR, 'value' => $request->BodyscrubTR, 'visible' => $request->visiblebs, 'product_id' => $prd->id],
                        ['name' => $request->BodyscrubQuantity, 'value' => $request->Quantitybs, 'visible' => $request->visiblebs, 'product_id' => $prd->id],
                        ['name' => $request->BodyscrubPrise, 'value' => $request->Pricebs, 'visible' => $request->visiblebs, 'product_id' => $prd->id],

                        ['name' => $request->BodyoilDescription, 'value' => $request->Bodyoil, 'visible' => $request->visiblebo, 'product_id' => $prd->id],
                        ['name' => $request->BodyoilDescriptionTR, 'value' => $request->BodyoilTR, 'visible' => $request->visiblebo, 'product_id' => $prd->id],
                        ['name' => $request->BodyoilQuantity, 'value' => $request->Quantitybo, 'visible' => $request->visiblebo, 'product_id' => $prd->id],
                        ['name' => $request->BodyoilPrise, 'value' => $request->Pricebo, 'visible' => $request->visiblebo, 'product_id' => $prd->id],

                        ['name' => $request->BodymilkDescription, 'value' => $request->Bodymilk, 'visible' => $request->visiblebm, 'product_id' => $prd->id],
                        ['name' => $request->BodymilkDescriptionTR, 'value' => $request->BodymilkTR, 'visible' => $request->visiblebm, 'product_id' => $prd->id],
                        ['name' => $request->BodymilkQuantity, 'value' => $request->Quantitybm, 'visible' => $request->visiblebm, 'product_id' => $prd->id],
                        ['name' => $request->BodymilkPrise, 'value' => $request->Pricebm, 'visible' => $request->visiblebm, 'product_id' => $prd->id],
                    ];
                    product_attribute::insert($myarray);
                } else {
                    $myarray = [
                        ['name' => $request->Descriptions, 'value' => $request->Description, 'visible' => $request->visible, 'product_id' => $prd->id],
                        ['name' => $request->howuse, 'value' => $request->how_use, 'visible' => $request->visible, 'product_id' => $prd->id],
                        ['name' => $request->activeingredients, 'visible' => $request->visible, 'value' => $request->active_ingredients, 'product_id' => $prd->id],
                        ['name' => $request->DescriptionsTR, 'value' => $request->DescriptionTR, 'visible' => $request->visible, 'product_id' => $prd->id],
                        ['name' => $request->howuseTR, 'value' => $request->how_useTR, 'visible' => $request->visible, 'product_id' => $prd->id],
                        ['name' => $request->activeingredientsTR, 'visible' => $request->visible, 'value' => $request->active_ingredientsTR, 'product_id' => $prd->id],
                        ['name' => $request->formulatedwithout, 'visible' => $request->visible, 'value' => $request->formulated_without, 'product_id' => $prd->id],
                        ['name' => $request->Prices, 'value' => $request->Price, 'visible' => $request->visible, 'visible' => $request->visible, 'product_id' => $prd->id],
                        ['name' => $request->Quantitys, 'value' => $request->Quantity, 'visible' => $request->visible, 'product_id' => $prd->id],

                    ];
                    product_attribute::insert($myarray);

                    foreach (array_combine($request->properties, $request->propertiesTR) as $propertie => $propertieTR) {
                        $prob = new propertie();
                        $prob->title = $propertie;
                        $prob->title_tr = $propertieTR;
                        $prob->product_id = $prd->id;
                        $prob->save();
                    }
                    // foreach ($request->properties as $propertie) {
                    //     $prob = new propertie();
                    //     $prob->title = $propertie;
                    //     $prob->product_id = $prd->id;
                    //     $prob->save();
                    // }
                    // foreach ($request->propertiesTR as $propertieTR) {
                    //     $prob = new propertie();
                    //     $prob->title_tr = $propertieTR;
                    //     $prob->product_id = $prd->id;
                    //     $prob->save();
                    // }
                }



                $img[$i] = str_replace(' ', '+', $img[$i]);
                $data = base64_decode($img[$i]);

                $temp_string = '/uploads/products/' . $prd->id;
                $temp_string2 = 'uploads/products/' . $prd->id;

                if (!file_exists(public_path() . $temp_string)) {
                    mkdir(public_path() . $temp_string, 0777, true);

                    $file = $temp_string2 . '/1' . $ext;

                    if (file_put_contents($file, $data)) {
                        echo "<p>Image $i was saved as $file.</p>";
                    } else {
                        echo '<p>Image $i could not be saved.</p>';
                    }
                }
            }


            return redirect()->route('admin.products');
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }


    public function edit($id)
    {
        $cat = Category::all();
        $prop = propertie::all();
        $prd = Product::find($id);

        return view('admin_panel.products.edit')
            ->with('product', $prd)
            ->with('catlist', $cat)
            ->with('prop', $prop)
            ->with('select_attribute', '');
    }
    public function editspa($id)
    {
        $prd = Product::find($id);
        return view('admin_panel.products.editspa')
            ->with('product', $prd)->with('select_attribute', '');
    }

    public function update(ProductEditVerifyRequest $request, $id)
    {
        $prdToUpdate = Product::find($request->id);
        $request->properties = isset($request->properties) ? $request->properties : [];
        $prdToUpdate->name = $request->Name;
        $prdToUpdate->name_tr = $request->NameTR;
        $prdToUpdate->category_id = $request->Category;
        $prdToUpdate->image_tag = $request->ImageTag;
        $prd_attr = product_attribute::where('product_id', $request->id)->get();

        foreach ($prd_attr as $attr) {
            if ($attr->name == "Description") {
                $attr->value = $request->Description;
                $attr->save();
            }
            if ($attr->name == "Description TR") {
                $attr->value = $request->DescriptionTR;
                $attr->save();
            }
            if ($attr->name == "How To Use") {
                $attr->value = $request->how_use;
                $attr->save();
            }
            if ($attr->name == "How To Use TR") {
                $attr->value = $request->how_useTR;
                $attr->save();
            }
            if ($attr->name == "Active Ingredients") {
                $attr->value = $request->active_ingredients;
                $attr->save();
            }
            if ($attr->name == "Active Ingredients TR") {
                $attr->value = $request->active_ingredientsTR;
                $attr->save();
            }
            if ($attr->name == "Formulated Without") {
                $attr->value = $request->formulated_without;
                $attr->save();
            }
            if ($attr->name == "Quantity") {
                $attr->value = $request->Quantity;
                $attr->save();
            }
            if ($attr->name == "Price") {
                $attr->value = $request->Price;
                $attr->visible = $request->visible;
                $attr->save();
            }
            if ($attr->name == "Body scrub Description") {
                $attr->value = $request->Bodyscrub;
                $attr->save();
            }
            if ($attr->name == "Body scrub Description TR") {
                $attr->value = $request->BodyscrubTR;
                $attr->save();
            }
            if ($attr->name == "Body scrub Quantity") {
                $attr->value = $request->Quantitybs;
                $attr->save();
            }
            if ($attr->name == "Body scrub Price") {
                $attr->value = $request->Pricebs;
                $attr->visible = $request->visiblebs;
                $attr->save();
            }
            if ($attr->name == "Body oil Description") {
                $attr->value = $request->Bodyoil;
                $attr->save();
            }
            if ($attr->name == "Body oil Description TR") {
                $attr->value = $request->BodyoilTR;
                $attr->save();
            }
            if ($attr->name == "Body oil Quantity") {
                $attr->value = $request->Quantitybo;
                $attr->save();
            }
            if ($attr->name == "Body oil Price") {
                $attr->value = $request->Pricebo;
                $attr->visible = $request->visiblebo;
                $attr->save();
            }
            if ($attr->name == "Body milk Description") {
                $attr->value = $request->Bodymilk;
                $attr->save();
            }
            if ($attr->name == "Body milk Description TR") {
                $attr->value = $request->BodymilkTR;
                $attr->save();
            }
            if ($attr->name == "Body milk Quantity") {
                $attr->value = $request->Quantitybm;
                $attr->save();
            }
            if ($attr->name == "Body milk Price") {
                $attr->value = $request->Pricebm;
                $attr->visible = $request->visiblebm;
                $attr->save();
            }
        }

        $new_props =  array_keys($request->properties);
        $old_prps = $prdToUpdate->propertie()->pluck('id')->toArray();
        $mutual = array_intersect($new_props, $old_prps);
        foreach ($prdToUpdate->propertie() as $prop) {
            if (!in_array($prop->id, $mutual) && !in_array($prop->id, $new_props)) {
                $prop->delete();
            }
        }
        if ($request->properties != NULL) {

            $ids = array_keys($request->properties);
            for ($i = 0; $i < sizeof($request->properties); $i++) {

                $en_item = $request->properties[$ids[$i]];
                $tr_item = $request->propertiesTR[$ids[$i]];

                $en_value = Value($en_item);
                $tr_value = Value($tr_item);

                $en_value = $en_value[0];
                $tr_value = $tr_value[0];
                $key = $ids[$i];

                if (isset($key) && $key != 0) {

                    $prob = propertie::find($key);
                    if ($prob) {
                        $prob->title_tr = $tr_value;
                        $prob->title = $en_value;
                        $prob->save();
                    } else {
                        // dd("ss");
                        $prob = new propertie();
                        $prob->title_tr = $tr_value;
                        $prob->title = $en_value;
                        $prob->product_id = $id;
                        $prob->save();
                    }
                } else {
                    // dd($key,$en_value,$tr_value);
                    $prob = new propertie();
                    $prob->title_tr = $tr_value;
                    $prob->title = $en_value;
                    $prob->product_id = $id;
                    $prob->save();
                }
            }

            // foreach ($request->properties as $key => $propertie) {
            //     if (isset($key) && $key != 0) {
            //         $prob = propertie::find($key);
            //         if ($prob) {
            //             $prob->title = $propertie[0];
            //             $prob->save();
            //         } else {
            //             $prob = new propertie();
            //             $prob->title = $propertie[0];
            //             $prob->product_id = $id;
            //             $prob->save();
            //         }
            //     } else {
            //         $prob = new propertie();
            //         $prob->title = $propertie[0];
            //         $prob->product_id = $id;
            //         $prob->save();
            //     }
            // }
            // foreach ($request->propertiesTR as $key => $propertieTR) {

            //     if (isset($key) && $key != 0) {
            //         $prob = propertie::find($key);
            //         if ($prob) {
            //             $prob->title_tr = $propertieTR[0];
            //             $prob->save();
            //         } else {
            //             $prob = new propertie();
            //             $prob->title_tr = $propertieTR[0];
            //             $prob->product_id = $id;
            //             $prob->save();
            //         }
            //     } else {
            //         $prob = new propertie();
            //         $prob->title_tr = $propertieTR[0];
            //         $prob->product_id = $id;
            //         $prob->save();
            //     }
            // }
        }



        //NEW FILE UPLOADED
        if ($request->img != "") {

            $img = explode('|', $request->img);

            for ($i = 0; $i < count($img) - 1; $i++) {

                if (strpos($img[$i], 'data:image/jpeg;base64,') === 0) {
                    $img[$i] = str_replace('data:image/jpeg;base64,', '', $img[$i]);
                    $ext = '.jpg';
                }
                if (strpos($img[$i], 'data:image/png;base64,') === 0) {
                    $img[$i] = str_replace('data:image/png;base64,', '', $img[$i]);
                    $ext = '.png';
                }



                $prdToUpdate->image_name = "1" . $ext;
                $prdToUpdate->save();




                $img[$i] = str_replace(' ', '+', $img[$i]);
                $data = base64_decode($img[$i]);


                $temp_string2 = 'uploads/products/' . $prdToUpdate->id;
                $file = $temp_string2 . '/1' . $ext;

                if (file_put_contents($file, $data)) {
                    echo "<p>Image $i was saved as $file.</p>";
                } else {
                    echo '<p>Image $i could not be saved.</p>';
                }
            }

            return redirect()->back();



            /*$file = $request->file('myfile');
            $extension=$file->getClientOriginalExtension();
            if($extension=="jpg"|| $extension=="jpeg"|| $extension=="png"|| $extension=="JPG"|| $extension=="JPEG"|| $extension=="PNG" )
            {
            //$temp_for_same_file_name = Product::where('image_name',$file->getClientOriginalName())->first();

            //$file_pointer = "uploads/products/".$product_image_ToUpdate->id."/".  $product_image_ToUpdate->image_name;
            //unlink($file_pointer);
            $temp_string='/uploads/products/'.$prdToUpdate->id;
            $prdToUpdate->image_name = "1.".$file->getClientOriginalExtension();
            $file->move(public_path().$temp_string."/","1.".$file->getClientOriginalExtension());
                
            $prdToUpdate->save();
            }
        
            return redirect()->route('admin.products');*/
        } else {

            $prdToUpdate->save();
            return redirect()->back();
        }
    }

    public function delete($id)
    {

        $prd = Product::find($id);

        return view('admin_panel.products.delete')
            ->with('product', $prd);
    }

    public function destroy(Request $request)
    {


        $prdToDelete = Product::find($request->id);

        //deleting image folder
        try {
            $src = 'uploads/products/' . $prdToDelete->id . '/';
            $dir = opendir($src);
            while (false !== ($file = readdir($dir))) {
                if (($file != '.') && ($file != '..')) {
                    $full = $src . '/' . $file;
                    if (is_dir($full)) {
                        rmdir($full);
                    } else {
                        unlink($full);
                    }
                }
            }
            closedir($dir);
            rmdir($src);
        } catch (\Exception $e) {
        }
        //deleting image folder done



        $prdToDelete->delete();

        return redirect()->route('admin.products');
    }
}
