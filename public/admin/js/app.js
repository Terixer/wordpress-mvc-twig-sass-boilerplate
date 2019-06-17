
(function ($) {
    $(document).ready(() => {
        mainCheckboxAction();
        addTask();
        deleteTask();
    });

    const enterKEY = '13';

    const HTML = {
        textInput: ".mpc-list .add-task input[type='text']",
        mainCheckbox: ".mpc-list .add-task input[type='checkbox']",
        checkboxes: ".mpc-list input[type='checkbox']",
        fullList: ".mpc-list ul"
    }

    function mainCheckboxAction() {
        $(HTML.mainCheckbox).on("click", function () {
            const checked = $(this).prop("checked")
            $(HTML.checkboxes).prop("checked", checked)
        });
    }

    function deleteTask() {
        $("body").on("click", ".delete-task", function () {
            const liElement = $($(this).parent());
            const taskId = liElement.find("input").attr("task-id");
            if (taskId) {
                const ajaxData = {
                    id: taskId
                }
                taskAjax(ajaxData, 'DELETE').then(() => {
                    liElement.remove();
                }).catch(e => {
                    console.log(e);
                });
            }
        });
    }
    function addTask() {
        $(HTML.textInput).on('keyup', function (e) {
            if (e.keyCode == enterKEY) {
                const textValue = $.trim($(this).val());
                if (textValue) {
                    const ajaxData = {
                        'title': textValue,
                        'done': false,
                    }
                    taskAjax(ajaxData, 'POST').then((response) => {
                        const newTask = `
                    <li>
                        <label>
                            <input task-id="${response.id}" type="checkbox">${textValue}
                        </label>
                        <span class="delete-task">X</span>
                    </li>`;
                        $(HTML.fullList).append(newTask);
                        $(HTML.textInput).val('')
                    }).catch(e => {
                    });

                }
            }
        });
    }

    function taskAjax(data, method) {
        return new Promise(function (resolve, reject) {
            $.ajax({
                data: data,
                method: method,
                url: MPCScript.endpoint,
                cache: false,
                dataType: 'json',
                success: function (data) {
                    resolve(data)
                },
                error: function (xhr, status, error) {
                    reject(`${xhr.status} - ${xhr.statusText}`)
                }
            });
        });
    }
})(jQuery);
