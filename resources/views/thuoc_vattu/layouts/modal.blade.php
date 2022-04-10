<div class="modal">
    <div class="modal-container">
         <div class="modal-close">
            <i class="ti-close"></i>
         </div>
        
        
            <header class="modal-header">
                <i class="modal-icon-bag ti-bag"></i>
                Tickets
            </header>

            <div class="modal-body">
                <label for="quatity" class="modal-label">
                    <i class="ti-shopping-cart"></i>
                    Tickets, $15 per person
                </label>
                <input id="quatity" type="text" class="modal-input" placeholder="How many?">

                <label for="email-modal" class="modal-label">
                    <i class="ti-user"></i>
                    Send to
                </label>
                <input  id="email-modal" type="email" class="modal-input" placeholder="Enter email...">
                <button id="buy-tickets">
                    Lay <i class="ti-check"></i>
                </button>

            </div>
            <div class="modal-footer">
                <p class="modal-help">Need <a href="">help?</a></p>
            </div>
        </div>
    </div>
</div> 


<script>
    var lickbtns=document.querySelector('.js-buy-tickets');
    var hiddenmodal=document.querySelector('.modal');
    var open=document.querySelector('.modal-close');

    var noibot=document.querySelector('.modal-container');
   
 
    for(var lickbtn of lickbtns){
        lickbtn.onclick = function(){
            hiddenmodal.classList.add('open');
         }
           
    }
    open.onclick = function(){
        hiddenmodal.classList.remove('open');

    }

    hiddenmodal.onclick = function(){
        hiddenmodal.classList.remove('open');

    }
    noibot.addEventListener('click', function(event){
        event.stopPropagation();
    })
</script>