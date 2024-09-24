$(document).ready(function(){
    var next = 1;
    $(".add-more").click(function(e){
        e.preventDefault();
        var addto = "#field" + next;
        var addRemove = "#field" + (next);
        next = next + 1;
        var newIn = '<textarea autocomplete="off" class="input form-control" id="field' + next + '" name="field' + next + '" type="text"></textarea>';
        var newInput = $(newIn);
        var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" >-</button></div><div id="field">';
        var removeButton = $(removeBtn);
        $(addto).after(newInput);
        $(addRemove).after(removeButton);
        $("#field" + next).attr('data-source',$(addto).attr('data-source'));
        $("#count").val(next);  
        
            $('.remove-me').click(function(e){
                e.preventDefault();
                var fieldNum = this.id.charAt(this.id.length-1);
                var fieldID = "#field" + fieldNum;
                $(this).remove();
                $(fieldID).remove();
            });
    });
/*
<input type="hidden" name="count" value="1" />

<div class="form-group" >
    <div class="row" id="field">
        <div class="col-sm-11">
            <textarea autocomplete="off" class="form-control input" id="field1" name="prof1" type="text" placeholder="opção" data-items="8"></textarea>
        </div>
        <div class="col-sm-1">
            <button id="b1" class="btn btn-success add-more" type="button">+</button>
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <input type="hidden" name="count" value="1" />
        <div class="control-group" id="fields">
            <label class="control-label" for="field1">Nice Multiple Form Fields</label>
            <div class="controls" id="profs"> 
                <form class="input-append">
                    <div id="field"><input autocomplete="off" class="input" id="field1" name="prof1" type="text" placeholder="Type something" data-items="8"/><button id="b1" class="btn add-more" type="button">+</button></div>
                </form>
            <br>
            <small>Press + to add another form field :)</small>
            </div>
        </div>
    </div>
</div>

*/
    

    
});