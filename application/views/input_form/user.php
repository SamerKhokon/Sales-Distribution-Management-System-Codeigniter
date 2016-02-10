<br/>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                Add new User 
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" >
                            <div class="form-group">
                                <label>User Name</label>
                                <input class="form-control" id="user_name" placeholder="Enter User Name">

                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" id="user_pass" placeholder="Enter Password">
                            </div>

                            <div class="form-group">
                                <label>User Type</label>
                                <select id="user_type" class="form-control">
                                    <option value="d">Distributor</option>
                                    <option value="a">Admin</option>
                                </select>
                            </div>

                            <button type="button" id="user_btn" class="btn btn-success">Submit Button</button>
                            <button type="reset" class="btn btn-info">Reset Button</button>
                        </form>
                    </div>

                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>



    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    Users
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
					       <div id="table_user"></div>
                    </div>
                    <!-- /.table-responsive -->



                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>


