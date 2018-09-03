<?php include 'hubheader.php'?>
	
<!--
        <div class="content mt-3">

            <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                  <span class="badge badge-pill badge-success">Success</span> Welcome Back!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
-->


<!--hii-->

<!--Projects-->
            <div class="col-sm-5 col-lg-5" style = "padding-left:30px;">
                <div class="card text-white bg-flat-color-3">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <h4 class="mb-0">
                            <span class="count">72</span>
                        </h4>
                        <p class="text-light">SMS Members</p>


                    </div>

                </div>
            </div>

            <!--/.col-->
			<div class="col-sm-10 col-lg-10">
                <div class="">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
							
			   					</div>
                            </div>
                        </div>
		
				
				
				
				
				
      <div class="col-xl-10" >
                <div class="card" >
                    <div class="card-header">
                        <h4>World Domination Map</h4>
                    </div>
                    <div class="Vector-map-js">
                        <div id="vmap" class="vmap" style="height: 265px;"></div>
                    </div>
                </div>
                <!-- /# card -->
            </div>

        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script>
        ( function ( $ ) {
            "use strict";

            jQuery( '#vmap' ).vectorMap( {
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: [ '#1de9b6', '#03a9f5' ],
                normalizeFunction: 'polynomial'
            } );
        } )( jQuery );
    </script>

</body>
</html>
