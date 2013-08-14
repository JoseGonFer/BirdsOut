<?php get_admin_header(); ?>
    <div class="container" id="page">
    
    <div class="span_12">
    <div class="listing">
    <div class="accordion" id="accordion2">
  <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
	      News
      </a>
    </div>
    <div id="collapseOne" class="accordion-body collapse">
      <div class="accordion-inner">

		    	<table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Users tagged</th>
                  <th>Activities tagged</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>#wimbledon2013</td>
                  <td>100</td>
                  <td>99</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>#stockholm_uni</td>
                  <td>876</td>
                  <td>65</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>#surfaustralia</td>
                  <td>654</td>
                  <td>3</td>
                </tr>
              </tbody>
            </table>
            
      </div>
    </div>
  </div>
</div>
    </div>
    <div class="clear"></div>    
    </div>
    <div class="clear"></div>
	    	<div class="span_12">
	    	  <div class="hero-unit" style="margin-top:40px">
	    	  <?php wysiwyg(); ?>
  </div>
{{ trim(@id) }}	    	</div>
    </div>


<?php get_admin_footer(); ?>