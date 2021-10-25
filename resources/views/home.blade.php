@extends('layouts.app')

@section('content')
<div class="mycontainer">
    <div class="row justify-content-center">
        <div class="container">
            <section>
                <form action="" id ="home_categorys">
                    @csrf
                    <div class="row align-items-center ">
                        <div class="col-sm-4">
                            <div class="row align-items-center ">
                                <div class="col-sm-6">Manufacturer</div>
                                <select name="manufacturer" id="manufacturer" class="select-post custom-select-sm col-sm-6">
                                    <option value="" selected>All</option>
                                    @foreach ($manufacturer_all as $item)
                                        <option value="{{$item->Manufacturer}}"  @if("{{$manufacturer_id}}" == "{{$item->Manufacturer}}") selected @endif>{{$item->Manufacturer}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="row align-items-center ">
                                <div class="col-sm-6">MasterCategory</div>
                                <select name="mastercategory" id="mastercategory" class="select-post custom-select-sm col-sm-6">
                                    <option value="" selected>All</option>
                                    @if($mastercategory_all != NULL)
                                        @foreach ($mastercategory_all as $item)
                                            <option value="{{$item->Master_Category}}"  @if("{{$mastercategory_id}}" == "{{$item->Master_Category}}") selected @endif>
                                                <div class="text_overflow" style="width: 70px !important">{{$item->Master_Category}}</div>
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="row align-items-center ">
                                <div class="col-sm-6">SubCategory1</div>
                                <select name="subcategory1" id="subcategory1" class="select-post custom-select-sm col-sm-6">
                                    <option value="" selected>All</option>
                                    @if($subcategory1_all != NULL)
                                        @foreach ($subcategory1_all as $item)
                                            <option value="{{$item->Sub_Category1}}"  @if("{{$subcategory1_id}}" == "{{$item->Sub_Category1}}") selected @endif>
                                                <div class="text_overflow" style="width: 70px !important">{{$item->Sub_Category1}}</div>
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center ">
                        <div style="height: 5px !important">
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-sm-4">
                            <div class="row align-items-center ">
                                <div class="col-sm-6">SubCategory2</div>
                                <select name="subcategory2" id="subcategory2" class="select-post custom-select-sm col-sm-6">
                                    <option value="" selected>All</option>
                                    @if($subcategory2_all != NULL)
                                        @foreach ($subcategory2_all as $item)
                                            <option value="{{$item->Sub_Category2}}"  @if("{{$subcategory2_id}}" == "{{$item->Sub_Category2}}") selected @endif>
                                                <div class="text_overflow" style="width: 70px !important">{{$item->Sub_Category2}}</div>
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="row align-items-center ">
                                <div class="col-sm-6">SubCategory3</div>
                                <select name="subcategory3" id="subcategory3" class="select-post custom-select-sm col-sm-6">
                                    <option value="" selected>All</option>
                                    @if($subcategory3_all != NULL)
                                        @foreach ($subcategory3_all as $item)
                                            <option value="{{$item->Sub_Category3}}"  @if("{{$subcategory3_id}}" == "{{$item->Sub_Category3}}") selected @endif>
                                                <div class="text_overflow" style="width: 70px !important">{{$item->Sub_Category3}}</div>
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="row align-items-center ">
                                <div class="col-sm-6">SubCategory4</div>
                                <select name="subcategory4" id="subcategory4" class="select-post custom-select-sm col-sm-6">
                                    <option value="" selected>All</option>
                                    @if($subcategory4_all != NULL)
                                        @foreach ($subcategory4_all as $item)
                                            <option value="{{$item->Sub_Category4}}"  @if("{{$subcategory4_id}}" == "{{$item->Sub_Category4}}") selected @endif>
                                                <div class="text_overflow" style="width: 70px !important">{{$item->Sub_Category4}}</div>
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center ">
                        <div style="height: 10px !important">
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-sm-12" style="text-align: right !important">
                            <select name="rowcount" id="rowcount" class="select-post custom-select-sm">
                                <option value="5" @if($rowcount_id == '5') selected @endif>5 entries</option>
                                <option value="10" @if($rowcount_id == '10') selected @endif>10 entries</option>
                                <option value="20" @if($rowcount_id == '20') selected @endif>20 entries</option>
                                <option value="50" @if($rowcount_id == '50') selected @endif>50 entries</option>
                                <option value="100" @if($rowcount_id == '100') selected @endif>100 entries</option>
                                <option value="500" @if($rowcount_id == '500') selected @endif>500 entries</option>
                                <option value="1000" @if($rowcount_id == '1000') selected @endif>1000 entries</option>
                                <option value="5000" @if($rowcount_id == '5000') selected @endif>5000 entries</option>
                            </select>
                        </div>
                    </div>
                    <input type="submit" value="Submit" style="display:none;" />
                </form>
            </section>
            <section>
                <div class="row">
                    <div class="box">
                        <div class="box-header with-border">
                        </div> <!-- /.box-header -->

                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th >No</th>
                                            <th >Title</th>
                                            <th >Image</th>
                                            <th >Original Name</th>
                                            <th >File Link</th>
                                            <th >File Name</th>
                                            <th >Type</th>
                                            <th >Manafacturer</th>
                                            <th >Main Category</th>
                                            <th >Sub Category1</th>
                                            <th >Sub Category2</th>
                                            <th >Sub Category3</th>
                                            <th >Sub Category4</th>
                                            <th >Content Type</th>
                                            <th >Content Length</th>
                                            <th >ETag</th>
                                            <th>Last Modified by Mfg</th>
                                            <th>Last Modified by SETVI</th>
                                            <th >Verstion</th>
                                            <th >Status</th>
                                            <th >Blob Link</th>
                                            <th >Web Structure</th>
                                            <th >Last Verified</th>
                                            <th >Created Date</th>
                                            <th >Description</th>
                                            <th >SDS</th>
                                            <th >Attachments</th>
                                            <th >Category Title</th>
                                            <th >Category Description</th>
                                            <th >Category Image</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($scrapingdata as $key => $data)
                                            <tr class="products-item" >
                                                <td>{{ $scrapingdata->firstItem() + $key }}</td>
                                                <td>
                                                    <div style="width: 300px !important;">{{ $data->Title }}</div>
                                                </td>
                                                <td>
                                                    <div style="vertical-align: middle !important;">
                                                        <img src="{{ $data->Image }}" alt="Image None" height="150px">
                                                    </div>
                                                </td>
                                                <td><div class="overflow-hidden" style="width: 200px !important;">{{ $data->Original_Name }}</div></td>

                                                <td>
                                                    <div class="overflow-hidden" style="width: 250px !important;">
                                                        <a href="{{$data->File_Link}}" target="_blank" class="badge badge-light">
                                                            {{ $data->File_Link }}
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="overflow-hidden" style="width: 300px !important;">{{ $data->File_Name }}</div>
                                                </td>
                                                <td>
                                                    {{ $data->File_Type }}
                                                </td>
                                                <td>
                                                    {{ $data->Manufacturer }}
                                                </td>
                                                <td>
                                                    {{ $data->Master_Category }}
                                                </td>
                                                <td>
                                                    {{ $data->Sub_Category1 }}
                                                </td>
                                                <td>
                                                    {{ $data->Sub_Category2 }}
                                                </td>
                                                <td>
                                                    {{ $data->Sub_Category3 }}
                                                </td>
                                                <td>
                                                    {{ $data->Sub_Category4 }}
                                                </td>
                                                <td>
                                                    {{ $data->Content_Type }}
                                                </td>
                                                <td>
                                                    {{ $data->Content_Length }}
                                                </td>
                                                <td>
                                                    {{ $data->ETag }}
                                                </td>
                                                <td>
                                                    {{ $data->Last_Modified_by_Mfg }}
                                                </td>
                                                <td>
                                                    {{ $data->Last_Modified_by_SETVI }}
                                                </td>
                                                <td>
                                                    {{ $data->Version }}
                                                </td>
                                                <td>
                                                    {{ $data->Status }}
                                                </td>
                                                <td>
                                                    <div class="overflow-hidden" style="width: 200 !important;">{{ $data->Blob_Link }}</div>
                                                </td>
                                                <td>
                                                    <div class="overflow-hidden" style="width: 200px !important;">{{ $data->Web_Structure }}</div>
                                                </td>
                                                <td>
                                                    {{ $data->Last_Verified }}
                                                </td>
                                                <td>
                                                    {{ $data->Created_date }}
                                                </td>
                                                <td >
                                                    <div class="overflow-auto" style="width: 500px !important; max-height: 150px;">{{ $data->Description }}</div>
                                                </td>
                                                <td>
                                                    <div class="overflow-auto" style="width: 400px !important; max-height: 150px !important;">
                                                        <ul class="list-group list-group-flush">
                                                            <?php
                                                                $str = $data->SDS
                                                            ?>
                                                            @for ($x = 1; $x <= count(explode(",",$str)); $x++)
                                                                <li class="list-group-item">
                                                                    <div class="text_overflow">{{ explode(",",$str)[$x-1] }}</div>
                                                                </li>
                                                            @endfor
                                                        </ul>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="overflow-auto" style="width: 400px !important; max-height: 150px !important;">
                                                        <ul class="list-group list-group-flush">
                                                            <?php
                                                                $str = $data->Attachments
                                                            ?>
                                                            @for ($x = 1; $x <= count(explode(",",$str)); $x++)
                                                                <li class="list-group-item">
                                                                    <div class="text_overflow">{{ explode(",",$str)[$x-1] }}</div>
                                                                </li>
                                                            @endfor
                                                        </ul>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div style="width: 300px !important;">{{ $data->CategoryTitle }}</div>
                                                </td>
                                                <td >
                                                    <div class="overflow-auto" style="width: 500px !important; max-height: 150px;">{{ $data->CategoryDescription }}</div>
                                                </td>
                                                <td>
                                                    <div style="vertical-align: middle !important;">
                                                        <img src="{{ $data->CategoryImage }}" alt="None" height="150px">
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th >No</th>
                                            <th >Title</th>
                                            <th >Image</th>
                                            <th >Original Name</th>
                                            <th >File Link</th>
                                            <th >File Name</th>
                                            <th >Type</th>
                                            <th >Manafacturer</th>
                                            <th >Main Category</th>
                                            <th >Sub Category1</th>
                                            <th >Sub Category2</th>
                                            <th >Sub Category3</th>
                                            <th >Sub Category4</th>
                                            <th >Content Type</th>
                                            <th >Content Length</th>
                                            <th >ETag</th>
                                            <th>Last Modified by Mfg</th>
                                            <th>Last Modified by SETVI</th>
                                            <th >Verstion</th>
                                            <th >Status</th>
                                            <th >Blob Link</th>
                                            <th >Web Structure</th>
                                            <th >Last Verified</th>
                                            <th >Created Date</th>
                                            <th >Description</th>
                                            <th >SDS</th>
                                            <th >Attachments</th>
                                            <th >Category Title</th>
                                            <th >Category Description</th>
                                            <th >Category Image</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div> <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            {!! $scrapingdata->appends([
                                'scrapingdata'=>$scrapingdata,
                                'manufacturer'=>$manufacturer_id,
                                'mastercategory'=>$mastercategory_id,
                                'subcategory1'=>$subcategory1_id,
                                'subcategory2'=>$subcategory2_id,
                                'subcategory3'=>$subcategory3_id,
                                'subcategory4'=>$subcategory4_id,
                                'rowcount'=>$rowcount_id
                            ])  ->links() !!}
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
