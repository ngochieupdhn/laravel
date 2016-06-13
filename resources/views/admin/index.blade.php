@extends('layouts.master')

@section('content')
<div class="row-fluid">
    <div class="span12 search">
        <form>
            <input type="text" class="span11" placeholder="Some text for search..." name="search"/>
            <button class="btn span1" type="submit">Search</button>
        </form>
    </div>
</div>
<!-- /row-fluid-->

<div class="row-fluid">

    <div class="span12">
        <div class="head">
            <div class="isw-grid"></div>
            <h1>Products Management</h1>

            <div class="clear"></div>
        </div>
        <div class="block-fluid table-sorting">
            <a href="/admin/add" class="btn btn-add">Add Product</a>
            <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortable_2">
                <thead>
                <tr>
                    <th><input type="checkbox" id="checkAll"/></th>
                    <th width="10%" class="sorting"><a href="#">ID</a></th>
                    <th width="30%" class="sorting"><a href="#">Product Name</a></th>
                    <th width="15%" class="sorting"><a href="#">Price</a></th>
                    <th width="15%" class="sorting"><a href="#">Activate</a></th>
                    <th width="10%" class="sorting"><a href="#">Time Created</a></th>
                    <th width="10%" class="sorting"><a href="#">Time Updated</a></th>
                    <th width="10%">Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach ($items as $item) {
                            echo '<tr>';
                            echo '<td><input type="checkbox" name="checkbox"/></td>';
                            echo '<td>'.$item->id.'</td>';
                            echo '<td>'.$item->name.'</td>';
                            echo '<td>'.$item->price.'</td>';
                            echo '<td>'.$item->active.'</td>';
                            echo '<td>'.$item->created_at.'</td>';
                            echo '<td>'.$item->updated_at.'</td>';
                            echo '<td><a href="edit-product.html" class="btn btn-info">Edit</a></td>';
                            echo '</tr>';
                        }
                    ?>
                </tbody>
            </table>
            <div class="bulk-action">
                <a href="#" class="btn btn-success">Activate</a>
                <a href="#" class="btn btn-danger">Delete</a>
            </div><!-- /bulk-action-->
            <div class="dataTables_paginate">
                <a class="first paginate_button paginate_button_disabled" href="#">First</a>
                <a class="previous paginate_button paginate_button_disabled" href="#">Previous</a>
                <span>
                    <a class="paginate_active" href="#">1</a>
                    <a class="paginate_button" href="#">2</a>
                </span>
                <a class="next paginate_button" href="#">Next</a>
                <a class="last paginate_button" href="#">Last</a>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>

@stop