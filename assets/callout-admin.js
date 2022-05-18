//add marker
$(document).on('click', '.callout-map', function(e){

    let coords = getCoords(this, e)
        hash = this.dataset.hash,
        img_id = this.dataset.img_id,
        item_id = this.dataset.item_id;

    $('#modal-callout').find('.modal-body').load('/calloutimage/callout/add-marker', function(){

        document.getElementById('calloutimage-cx').value = coords.x;
        document.getElementById('calloutimage-cy').value = coords.y;
    
        document.getElementById('calloutimage-hash').value = hash;
        document.getElementById('calloutimage-img_id').value = img_id;
        document.getElementById('calloutimage-item_id').value = item_id;

        $('#modal-callout').modal();

    })
    
})

function getCoords($this, $e){

    let image = $this.querySelector('.callout-img');

    let ratio = image.naturalWidth / image.clientWidth;
   
    let x = Math.round(($e.clientX - $this.getBoundingClientRect().left) * ratio);

    let y = Math.round(($e.clientY - $this.getBoundingClientRect().top) * ratio);

    return {x, y};
}

//SEND MODAL FORM
$(document).on('beforeSubmit', '#callout-image-form', function(){
  
    var data = $(this).serialize();
    $.ajax({
        url: '/calloutimage/callout/add-marker',
        type: 'POST',
        data: data,
        success: function(res){
          $('#modal-callout .modal-body').html(res);
        },
    });
    return false;

});
// var $svg = document.querySelector('#svg')

// $svg.addEventListener('click', function(e){

//     //coords
//     let ratio = $svg.previousElementSibling.naturalWidth / $svg.previousElementSibling.width
//     let x = Math.round((e.clientX - $svg.getBoundingClientRect().left) * ratio)
//     let y = Math.round((e.clientY - $svg.getBoundingClientRect().top) * ratio)
    
//     if(id_circle = e.target.getAttribute('data-id')){

//         document.querySelector('#circle-delete').value = id_circle
//         document.querySelector('#deleting').textContent = e.target.getAttribute('data-title')
//         $('#modalCircleDelete').modal()

//     }else{
//         createCircle(x, y)

//         document.querySelector('#circle-cx').value = x
//         document.querySelector('#circle-cy').value = y
    
//         $('#modalCircleCreate').modal()
//     }
    
// })

// //when closed and no save
// $('#modalCircleCreate').on('hidden.bs.modal', function (e) {
//     document.querySelector('#newCircle').remove()
// })

// function createCircle(x, y){
//     let el = document.createElementNS('http://www.w3.org/2000/svg', "circle")

//     el.setAttributeNS(null, 'cx', x)
//     el.setAttributeNS(null, 'cy', y)
//     el.setAttributeNS(null, 'class', "svg-circle")
//     el.setAttributeNS(null, 'id', "newCircle")

//     $svg.appendChild(el)
// }