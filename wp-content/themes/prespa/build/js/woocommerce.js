!function(e){function t(){const e=document.querySelectorAll(".prespa-featured-products-wrapper .add_to_cart_button");if(!(e.length<1))for(let t=0;t<e.length;t++){const n=document.createElement("span");n.innerText=e[t].innerText,e[t].className+=" wp-element-button",e[t].innerHTML="",e[t].appendChild(n),e[t].setAttribute("data-text",n.innerText)}}e("body").on("wc_fragments_loaded added_to_cart",(function(){t(),e(document).ajaxSuccess((function(n,a,d){-1!==d.url.indexOf("?wc-ajax=add_to_cart")&&(e(this.activeElement).hide(),e(this.activeElement).next().addClass("add_to_cart_button wp-element-button"),t())}))})),document.body.addEventListener("wc-blocks_added_to_cart",(()=>{e(document.body).trigger("wc_fragment_refresh")})),document.getElementsByClassName("site-header-cart").length>0&&document.getElementsByClassName("site-header-cart")[0].addEventListener("mouseleave",(function(){this.className=this.className.replace(" focus","")}))}(jQuery);