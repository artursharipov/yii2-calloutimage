//add marker
$(document).on('click', '.callout-map', function(e){

    let coords = getCoords(this, e)
        hash = this.dataset.hash,
        img_id = this.dataset.img_id,
        item_id = this.dataset.item_id;

    createCircle(coords.x, coords.y, this);

    $('#modal-callout').find('.modal-body').load('/calloutimage/callout/add-marker', function(){

        document.getElementById('calloutimage-cx').value = coords.x;
        document.getElementById('calloutimage-cy').value = coords.y;
    
        document.getElementById('calloutimage-hash').value = hash;
        document.getElementById('calloutimage-img_id').value = img_id;
        document.getElementById('calloutimage-item_id').value = item_id;

        $('#modal-callout').modal();

    })
    
});

function getCoords($this, $e){

    let image = $this.querySelector('.callout-img');

    let ratio = image.naturalWidth / image.clientWidth;
   
    let x = Math.round(($e.clientX - $this.getBoundingClientRect().left) * ratio);

    let y = Math.round(($e.clientY - $this.getBoundingClientRect().top) * ratio);

    return {x, y};
}

function createCircle(x, y, $this){

    let el = document.createElementNS('http://www.w3.org/2000/svg', "circle");

    el.setAttributeNS(null, 'cx', x);
    el.setAttributeNS(null, 'cy', y);
    el.setAttributeNS(null, 'class', "callout-circle");
    // el.setAttributeNS(null, 'id', "newCircle")

    $this.querySelector('.callout-svg').appendChild(el);
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

// //when closed and no save
$(document).on('hidden.bs.modal', '#modal-callout', function (e) {
    console.log('Refresh')
})