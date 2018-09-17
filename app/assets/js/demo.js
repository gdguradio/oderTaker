$(document).ready(function () {
    selecttask("selectall");
    


    $('#tasktable').on('click','.star', function () {
        $(this).toggleClass('star-checked');
    });

    $('#tasktable').on('click','.ckbox label', function () {
        $('.ckbox label').not(this).parents('tr').removeClass('selected');
        $(this).parents('tr').addClass('selected');
    });

    $('.btn-group').on('click','.btn-filter', function () {
        var $target = $(this).data('target');
        $('.table tr').css('display', 'none');
        if ($target != 'all') {
            
            $('.table tr[data-status="' + $target + '"]').fadeIn('slow');
        } else {
            $('.table tr').css('display', 'none').fadeIn('slow');
        }
    });
    $('#DemoModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var action = button.data('action'); // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        $("[name=task]").val("");
        $("[name=task_person]").val("");
        $("[name=task_status]").val(0);
        modal.find('.modal-title').text(action + " entry")
        $('#demoform').attr('data-action',action);
        
        if (action == "Add") {
            $('#datetimepicker5').datetimepicker({
                minDate: new Date()
            });

        }
        if (action == "Edit") {

            var name = $("#tasktable tr.selected td:nth-child(2)").find('h4.title').text();
            var date = $("#tasktable tr.selected td:nth-child(2)").find('span.media-meta').text();
            var task = $("#tasktable tr.selected").find("p.summary").text();
            var status = $("#tasktable tr.selected").attr('data-taskstatus');
            $('#datetimepicker5').datetimepicker({
                defaultDate: date
            });
            $("[name=task]").val(task);
            $("[name=task_person]").val(name);
            $("[name=task_status]").val(status);

            
        }
        
        //modal.find('.modal-body input').val(recipient)
    });
    
    
    $('#delete').click(function(){

        var data = $('#demoform').serialize();
        var action = "delete";
        var sysid = "";
        $("#tasktable tr.selected").attr('data-sysid') ? sysid = $("#tasktable tr.selected").attr('data-sysid') : sysid = "";
        formsubmit(action,data,sysid)
        





    });
    
    $('#submit').click(function(){
        var data = $('#demoform').serialize();
        var action = $('#demoform').attr('data-action');
        var sysid = "";
        $("#tasktable tr.selected").attr('data-sysid') ? sysid = $("#tasktable tr.selected").attr('data-sysid') : sysid = "";
        formsubmit(action,data,sysid)
        
        
        
    });
});

function selecttask(action){
    $.ajax({
        type: 'POST',
        url: '/Demo/include/demo.php',
        dataType: "json",
        data: {
            action: action
        },
        success: function (data) {
            
        }
    }).done(function (data) {
        if (data.length > 0) {
            $("#tasktable tbody").empty();
        }
        console.log(data)
        var row;
        var row1;
        var status = ["pending", "cancelled", "finished"];
        for (var i = 0; i < data.length; i++) {
            row += '<tr data-sysid='+data[i].sys_id+' data-taskstatus=' + data[i].task_status + ' data-status=' + status[data[i].task_status] + '><td><div class="ckbox"><input type="radio" name="todo" id="checkbox'+i+'"><label for="checkbox'+i+'"></label></div></td><td><div class="media"><div class="media-body"><span class="media-meta pull-right">' + data[i].task_date + '</span><h4 class="title">' + data[i].task_person + '<span class="pull-right ' + status[data[i].task_status] + '"></span></h4><p class="summary">' + data[i].task + '</p></div></div></td></tr>';
                
        }


        $("#tasktable tbody").append(row);
        
    });

}

function formsubmit(action,data,sysid){
    $.ajax({
        type: 'POST',
        url: '/Demo/include/demo.php',
        dataType: "json",
        data: {
            data: data,
            action: action,
            sysid: sysid
        },
        success: function (data) {

        }
    }).done(function (data) {



        selecttask("selectall");
        if(action !='delete'){
           $('#DemoModal').modal('toggle');
        }
        

    });

}