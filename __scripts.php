  <!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
crossorigin="anonymous"></script>

  <!---------- 主視覺  script---------- -->
<!-- <script>
  TweenMax.to("#wave", 2, {
      attr: {
          d: "M0 120 Q360 180 720 120 T 2000 120 V240 H0 Z"
      },
      ease: Power1.easeInOut,
      repeat: -1,
      yoyo: true
  }) -->
</script>

<script>
    // setCartCount
    const cart_count = $('.cart-count');  // span tag
    const cart_short_list = $('.cart-short-list');

    $.get('handle-cart.php', function(data){
        setCartCount(data);
    }, 'json');

    function setCartCount(data) {
        let count = 0
 // cart_short_list.empty();
        // if(data && data.cart_w && data.cart_w.length){
          count = data.cart_w.length;
          if(count==0){
            cart_count.hide()
          }else{
            cart_count.show()
            cart_count.text(count);
          }
            
        // }
        
       
       
    }

</script>