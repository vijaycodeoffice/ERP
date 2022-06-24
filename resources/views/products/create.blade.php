@extends('app')

@section('content')

 @include('common.leftmenu')
 
 
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product Definition</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
 
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
 
         
              <!-- form start -->
              <!-- <div>{!! DNS1D::getBarcodeHTML('4445645656', 'PHARMA') !!}</div></br>-->
              <!-- <div>{!! DNS1D::getBarcodeHTML('4445645656', 'C39') !!}</div></br>
       <div>{!! DNS1D::getBarcodeHTML('4445645656', 'POSTNET') !!}</div></br>
       <div>{!! DNS1D::getBarcodeHTML('4445645656', 'PHARMA') !!}</div></br>
       <div>{!! DNS2D::getBarcodeHTML('4445645656', 'QRCODE') !!}</div></br> -->

      @php //echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG("4", "C39+",3,33) . '" alt="barcode"   />'; @endphp
			  
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
			 <div class="col-12">
         
                <div class="card-body">
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="Item Name">Item name</label>
                    <input type="text" name="item_name" class="form-control" id="item_name" placeholder="Item Name">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="Category Name">Category Name</label>
                    <select name="category_name" id="category_name" class="form-control">
                        <option value="" selected="" disabled="" >Select Category</option>
                @foreach($category as $cat)
                        <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                @endforeach 
                    </select>


                  </div>
                  <div class="form-group col-md-4">
                    <label for="Subcategory name">Subcategory name</label>
                    
                    <select name="subcategory_name" id="subcategory_name" class="form-control">
                        <option value="" selected="" disabled="" >Select Subcategory</option>
                @foreach($subcategory as $subcat)
                        <option value="{{$subcat->id}}">{{$subcat->subcategory_name}}</option>
                @endforeach 
                    </select>

                  
                  </div>

                 </div>

                 
                 <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="Unit of Measure">Unit of Measure</label>

                    <select name="unit_name" id="unit_name" class="form-control">
                        <option value="" selected="" disabled="" >Select Unit</option>
                @foreach($unitofmeasure as $unit)
                        <option value="{{$unit->id}}">{{$unit->unit_name}}</option>
                @endforeach 
                    </select>

                   
                  </div>

                  <div class="form-group col-md-4">
                  <label for="Warehouse">Warehouse</label>

                  <select name="warehouse_name" id="warehouse_name" class="form-control">
                        <option value="" selected="" disabled="" >Select Warehouse</option>
                @foreach($warehouse as $ware)
                        <option value="{{$ware->id}}">{{$ware->warehouse_name}}</option>
                @endforeach 
                    </select>

                
                  </div>
                  

                  <div class="form-group col-md-4">
                  <label for="Attachment">Attachment</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="item_attachment" class="custom-file-input" id="item_attachment">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>

                  </div>

</div>

                 

                  </div>


                  <div class="form-row" id="myTable">
                    
                

                  <div class="form-group col-md-4">
                  
                    <input type="hidden" value="0" name="quantity_added" class="form-control txtCal" id="quantity_added" placeholder="Quantity Added">
                  </div>


                  <div class="form-group col-md-4">
                   
                    <input type="hidden" value="0" name="quantity_balance" class="form-control" id="quantity_balance" placeholder="Quantity Balance" readonly>
                   
                  </div>


                  <div class="form-group col-md-4">
                   
                  

                    </div>
                  </div>

         

                  <div class="form-row">

                  <div class="form-group col-md-4">

                  <label for="price">Item Price</label>
                    <input type="text" name="price" value="" class="form-control txtCal" id="price" placeholder="Item Price">
                  

                 
                  </div>
                  <div class="form-group col-md-4">

                 
                  <label for="SKU">SKU</label>
                    <input type="text" name="sku" value="{{$sku_number}}" class="form-control txtCal" id="sku" placeholder="SKU" readonly>
                    <input type="hidden" name="initial_quantity" value="0" class="form-control txtCal" id="initial_quantity" placeholder="Initial Quantity">




                  </div>
                  <div class="form-group col-md-4">

                  <label for="narration">Barcode</label>
                 <br>
                   @php
                $generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
            @endphp
            <img name="item_barcodesss" src="data:image/png;base64,{{ base64_encode($generatorPNG->getBarcode('$sku_number', $generatorPNG::TYPE_CODE_128)) }}">
  
            <input type="hidden" name="item_barcode" value="data:image/png;base64,{{ base64_encode($generatorPNG->getBarcode('$sku_number', $generatorPNG::TYPE_CODE_128)) }}" class="form-control">



                 
                  </div>

                  </div>


                  <div class="form-row">

    <div class="form-group col-md-6">
                   
    <label for="Item Description">Item Description</label>
    <textarea class="form-control" name="item_description" id="item_description" rows="3"></textarea>
    </div>

    <div class="form-group col-md-6">
                   
    <label for="narration">Narration</label>
    <textarea class="form-control" name="narration" id="narration" rows="3"></textarea>
    </div>




                
				</div>	</div>
				
				
	
				<a class="btn btn-primary " href="{{ route('products') }}"> Back </a>
				
                <!-- /.card-body -->

            <button type="submit" class="btn btn-primary float-right">Submit</button>
            
              </form>
 
 
 </div></div></div>
 </section>
 
 </div>
   
 <script>
    $(document).ready(function(){
  
      $("#myTable").on('input', '.txtCal', function () {
       var calculated_total_sum = 0;
     
       $("#myTable .txtCal").each(function () {
           var get_textbox_value = $(this).val();
           if ($.isNumeric(get_textbox_value)) {
              calculated_total_sum += parseFloat(get_textbox_value);
              }                  
            });
              $("#quantity_balance").val(calculated_total_sum);
       });



    })
</script>



@include('common.footer')     
@endsection
