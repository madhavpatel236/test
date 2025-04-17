<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
</head>

<body>
    <div>
        <span style="margin-right: 100px;">Users Number </span>
        <span>Points </span>
    </div>

    <div>
        <input name="user_number0" id="user_number0" type="number" min="0" />
        <input name="points0" id="points0" type="number" min="0" />
        <button id="plus_btn" name="plus_btn"> + </button>
    </div> <br>
    <div class="plus_data_div" id="plus_data_div" name="plus_data_div"></div>

    <table>

    </table>
    <form id="add_btn_form" method="post">
        <button id="add_btn" class="add_btn" name="add_btn"> Add </button>
    </form>
</body>

<script>
    var count = 0;
    var numberOfUserArray = [];
    var pointsArray = [];

    $(document).ready(function() {

        $('#plus_btn').click(function() {
            count += 1;
            if (count >= 1) {
                var field = `
            <div class='new_added_div${count}'  id='${count}'>
                <div>
                    <input class='user_number' id = 'user_number${count}' type="number" />
                    <input class='points' id='points${count}' type="number" />
                    <input class='field_id' id='${count}' hidden />
                    <button onclick='removeFieldData(${count})'  class="remove_btn" id = '${count}'> - </button>
            </div> <br/> </div>`;
                $('.plus_data_div').append(field)
            };
        })

        $('.add_btn').click(function(e) {
            e.preventDefault();
            for (let i = 0; i <= count; i++) {
                var numberOfUser = $(`#user_number${i}`).val();
                var points = $(`#points${i}`).val();
                numberOfUserArray[i] = numberOfUser;
                pointsArray[i] = points;
            }

            $.ajax({
                url: "<?php echo site_url('AdminController/addRules'); ?>",
                type: "POST",
                data: {
                    action: "add",
                    numberOfUser: numberOfUserArray,
                    points: pointsArray
                },
                success: function(response) {
                    alert(response);
                },
            });
        })
    })
</script>

</html>