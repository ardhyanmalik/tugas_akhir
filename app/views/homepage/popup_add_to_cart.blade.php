<!DOCTYPE html>
<html>
<head>
 	
	{{HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800')}}
    {{HTML::style('http://fonts.googleapis.com/css?family=Roboto:400,500,700,300')}}
    {{HTML::style('templates/theme/assets/skin/default_skin/css/theme.css')}}
    {{HTML::style('templates/theme/assets/admin-tools/admin-forms/css/admin-forms.css')}}

</head>
<body>
<div class="panel">
    <div class="panel-heading">
        <span class="panel-title"><i class="fa fa-shopping-cart"></i>Shooping Chart</span>
    </div>
    <div class="panel-body pn">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
            @foreach($cart_content as $cart)
                <tr>
                    <td>
                    {{ $cart->name }}
                    </td>
                    <td>
                    {{ $cart->price }} 
                    </td>
                    <td>
                    {{ $cart->qty}}
                    </td>
                    <td>Rp.{{ $cart->qty*$cart->price}}
                     </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            	<tr>
            		<td colspan="4">TOTAL</td>
            		<td></td>
            	</tr>
            </tfoot>
        </table>
        <div class="panel-footer">
        <a href="{{URL::route('products-premium-products-checkout')}}" class="media-heading right btn btn-sm  btn-success"><i class="fa fa-share"> Checkout</i>
        </a>
        </div>
 	</div>
</div>

{{HTML::script('templates/theme/vendor/jquery/jquery-1.11.1.min.js')}}
{{HTML::script('templates/theme/vendor/jquery/jquery_ui/jquery-ui.min.js')}}
{{HTML::script('templates/theme/assets/js/bootstrap/bootstrap.min.js')}}
{{HTML::script('http://cdnjs.cloudflare.com/ajax/libs/jquery-sparklines/2.1.2/jquery.sparkline.min.js')}}
{{HTML::script('templates/theme/assets/js/utility/utility.js')}}
{{HTML::script('templates/theme/assets/js/main.js')}}
{{HTML::script('templates/theme/assets/js/demo.js')}}
 <script type="text/javascript">
  jQuery(document).ready(function() {

            "use strict";

            // Init Theme Core    
            Core.init();

            // Init Theme Core    
            Demo.init();

            // Init tray navigation smooth scroll
            $('.tray-nav a').smoothScroll({
                offset: -145
            });

            // Custom tray navigation animation
            setTimeout(function() {
                $('.custom-nav-animation li').each(function(i, e) {
                    var This = $(this);
                    var timer = setTimeout(function() {
                        This.addClass('animated zoomIn');
                    }, 100 * i);
                });
            }, 600);


            // Sparklines Plugin
            $('.inlinesparkline').sparkline('html', {
                type: 'line',
                height: 30,
                width: 100,

                lineColor: bgInfoDr, // Also tooltip icon color
                fillColor: bgInfoLr,

                spotColor: bgPrimary,
                minSpotColor: bgPrimary,
                maxSpotColor: bgPrimary,

                highlightSpotColor: bgWarningDr,
                highlightLineColor: bgWarningLr
            });

            var barColors = $.range_map({
                '1:6': bgWarning,
                '7:11': bgInfo,
                '12:': bgPrimary
            })

            $('.inlinesparkbar').sparkline('html', {
                type: 'bar',
                height: 25,
                barWidth: 4,
                barSpacing: 1,

                barColor: bgPrimary, // Also tooltip icon color
                fillColor: bgInfoLr,
                colorMap: barColors, // Colors mapped/stored in object above

                spotColor: bgPrimary,
                minSpotColor: bgPrimary,
                maxSpotColor: bgPrimary,

                highlightSpotColor: bgWarningDr,
                highlightLineColor: bgWarningLr
            });

            $('.inlinesparkpie').sparkline('html', {
                type: 'pie',
                width: 30,
                height: 23,
                offset: 90,
                sliceColors: [bgPrimary, bgInfo, bgWarning, bgAlert, bgDanger]
            });
            $('.inlinesparkpie2').sparkline('html', {
                type: 'pie',
                width: 23,
                height: 23,
                offset: -45,
                sliceColors: [bgPrimary, bgSuccess, bgAlert, bgDark, bgDanger]
            });


        });
    </script>
</body>


