<section class="content-header">
    <h1>
        Students /
        <small><a href="home.php"><i class="fa fa-home"></i> Home</a></small>
    </h1>
    
</section>
<section class="content">
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <div class="col-xs-12">
                <div class="box">
                    <!-- <div class="col-xs-6"> -->
                    
                    <div class="box-header">
                    </div>
                    <!-- /.box-header -->
                    <div  class="box-body table-responsive">
                        <table  id='products_table' class="table table-hover" data-toggle="table" data-search="true" data-url="../api/get-bootstrap-table-data.php?table=students" data-page-list="[5, 10, 20, 50, 100, 200]" data-show-refresh="true"  data-side-pagination="server" data-pagination="true" data-query-params="queryParams_1"  data-trim-on-search="false" data-filter-control="true" data-sort-name="id" data-sort-order="desc"  data-export-types='["txt","excel"]' >
                            <thead>
                                <tr>
                                   
                                    <th  data-field="id" data-sortable="true">ID</th>
                                    <th  data-field="name" data-sortable="true">Name</th>
                                    <th  data-field="student_age" data-sortable="true">Student Age</th>
                                    <th  data-field="class" data-sortable="true">Class</th>
                                    <th data-field="school_name" data-sortable="true">School Name</th>
                                    <th data-field="school_address" data-sortable="true">School Address</th>
                                    <th data-field="aadhar_number" data-sortable="true">Student Aadhar Number</th>
                                    <th data-field="profile" data-sortable="true">Profile</th>
                                    <th  data-field="parent_name" data-sortable="true">Parent Name</th>
                                    <th  data-field="parent_phone_number" data-sortable="true">Parent Mobile Number</th>
                                    <th  data-field="email" data-sortable="true">Email ID</th>
                                    <th data-field="password" data-sortable="true">Password</th>
                                    <th data-field="utr_number" data-sortable="true">UTR Number</th>
                                    <th data-field="status" data-sortable="true">Status</th>
                                    <th data-field="operate" data-events="actionEvents">Action</th>
                                    
                                    
                                    
                                </tr>
                                  
                                
                            </thead>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <div class="separator"> </div>
        </div>
        <!-- /.row (main row) -->
    </section>
    <script>

    function queryParams_1(p) {
        return {
            limit: p.limit,
            sort: p.sort,
            order: p.order,
            offset: p.offset,
            search: p.search
        };
    }
</script>