//add marker
initCircles();

function initCircles(){
    document.querySelectorAll('.callout-map').forEach(function(item){

        let svg = item.querySelector('.callout-svg');

        svg.innerHTML = "";
        item.querySelector('.callout-container-info').innerHTML = "";

        createCircles(item.dataset.hash, item.dataset.img_id, svg);

    })
}

function createCircles(hash, img_id, $this){
    $.ajax({
        url: '/calloutimage/callout/circles',
        type: 'GET',
        data: {hash, img_id},
        success: function(json){
            let array = JSON.parse(json);

            for (let key in array) {
                let circle = array[key];

                createCircle(circle.cx, circle.cy, $this, circle.info);

                createCallout(Number(circle.cx), circle.cy, $this, circle.info);
            }
        },
    });
}

function createCircle(x, y, $this, $info = null){

    let el = document.createElementNS('http://www.w3.org/2000/svg', "circle");

    el.setAttributeNS(null, 'cx', x);
    el.setAttributeNS(null, 'cy', y);
    el.setAttributeNS(null, 'class', "callout-circle");

    if($info != null) el.setAttributeNS(null, 'data-info', $info)

    $this.appendChild(el);
}

function createCallout(cx, cy, $this, $info = null){

    let svg = $this.parentNode.querySelector('.callout-svg'),
        ratio = svg.clientWidth / svg.viewBox.baseVal.width,
        x = cx * ratio,
        y = cy * ratio;

    let el = document.createElement('div');
    let span = document.createElement('span');

    span.textContent = $info;

    el.setAttribute('class', 'callout-info');

    el.appendChild(span);

    el.style.top = y+'px';

    if(cx > svg.clientWidth/2){
        let paddingLeft = svg.clientWidth - cx + 20;
        el.style.left = x+'px';
        el.style.paddingLeft = paddingLeft+'px';
    }else{
        let paddingRight = cx + 20;
        let right = svg.clientWidth - cx;
        el.style.right = right+'px';
        el.style.paddingRight = paddingRight+'px';
    }
    

    $this.parentNode.querySelector('.callout-container-info').appendChild(el);

}

function getCoords($this, $e){

    let image = $this.parentNode.querySelector('.callout-img');

    let ratio = image.naturalWidth / image.clientWidth;
   
    let x = Math.round(($e.clientX - $this.getBoundingClientRect().left) * ratio);

    let y = Math.round(($e.clientY - $this.getBoundingClientRect().top) * ratio);

    return {x, y};
}

//SEND MODAL FORM
$(document).on('beforeSubmit', '#callout-image-form', function(){

    var data = $(this).serialize();
    $.ajax({
        url: this.action,
        type: 'POST',
        data: data,
        success: function(res){
          $('#modal-callout .modal-body').html(res);
        },
    });
    return false;

});

$(document).on('click', '#btnDeleteCallout', function(){

    let cx = document.getElementById('calloutimage-cx').value,
        cy = document.getElementById('calloutimage-cy').value,
        hash = document.getElementById('calloutimage-hash').value,
        img_id = document.getElementById('calloutimage-img_id').value;

    $.ajax({
        url: '/calloutimage/callout/delete-circle',
        type: 'GET',
        data: {cx, cy, hash, img_id},
        success: function(res){
          $('#modal-callout .modal-body').html(res);
        },
    });
})

$(document).on('click', '.callout-svg', function(e){

    let cx,
        cy,
        hash = this.parentNode.dataset.hash,
        img_id = this.parentNode.dataset.img_id;

    if(e.target.tagName === 'circle'){

        //update

        cx = e.target.getAttribute('cx');

        cy = e.target.getAttribute('cy');

        let url = `/calloutimage/callout/update-circle?cx=${cx}&cy=${cy}&hash=${hash}&img_id=${img_id}`;

        $('#modal-callout').find('.modal-body').load(url, function(){
            $('#modal-callout').modal();
        })

    }else{

        //create

        let coords = getCoords(this, e);

        cx = coords.x;
        
        cy = coords.y;

        createCircle(cx, cy, this);

        $('#modal-callout').find('.modal-body').load("/calloutimage/callout/add-circle", function(){

            document.getElementById('calloutimage-cx').value = cx;
            document.getElementById('calloutimage-cy').value = cy;
        
            document.getElementById('calloutimage-hash').value = hash;
            document.getElementById('calloutimage-img_id').value = img_id;
    
            $('#modal-callout').modal();
    
        })

    }
        
});

// //when closed and no save
$(document).on('hidden.bs.modal', '#modal-callout', function (e) {

    $('#modal-callout .modal-body').html('');

    initCircles();
})
