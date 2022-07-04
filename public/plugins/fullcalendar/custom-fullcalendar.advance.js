(function ($) {
    "use strict";
    $(function () {
        $(document).ready(function () {
            var modal = document.getElementById("addEventsModal");
            var btn = document.getElementById("myBtn");
            var addEvent = document.getElementById("add-e");
            var editEvent = document.getElementById("edit-event");
            var discardModal = document.querySelectorAll("[data-dismiss='modal']")[0];
            var addEventTitle = document.getElementsByClassName("add-event-title")[0];
            var editEventTitle = document.getElementsByClassName("edit-event-title")[0];
            var span = document.getElementsByClassName("close")[0];
            var input = document.querySelectorAll('input[type="text"]');
            var radioInput = document.querySelectorAll('input[type="radio"]');
            var textarea = document.getElementsByTagName('textarea');

            var calendar;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'GET',
                url: '/TaskTable/all',
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {

                    var events = [];
                    for (let index = 0; index < data.length; index++) {
                        events.push({
                            id:  data[index]['id'],
                            title: data[index]['title'],
                            start: data[index]['start'],
                            end: data[index]['end'],
                            className: data[index]['className'],
                            description: data[index]['description']
                        });


                    }
                    var calendar = $('#calendar').fullCalendar({
                        header: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'month,agendaWeek,agendaDay'
                        },
                        events: events,
                        editable: true,
                        eventLimit: true,
                        eventMouseover: function (event, jsEvent, view) {
                            $(this).attr('id', event.id);
                            $('#' + event.id).popover({
                                template: '<div class="popover popover-primary" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>',
                                title: event.title,
                                content: event.description,
                                placement: 'top',
                            });
                            $('#' + event.id).popover('show');
                        },
                        eventMouseout: function (event, jsEvent, view) {
                            $('#' + event.id).popover('hide');
                        },
                        eventClick: function (info) {
                            addEvent.style.display = 'none';
                            editEvent.style.display = 'block';
                            addEventTitle.style.display = 'none';
                            editEventTitle.style.display = 'block';
                            modal.style.display = "block";
                            document.getElementsByTagName('body')[0].style.overflow = 'hidden';
                            createBackdropElement();
                            // Calendar Event Featch
                            var eventTitle = info.title;
                            var eventDescription = info.description;
                            // Task Modal Input
                            var taskTitle = $('#write-e');
                            var taskTitleValue = taskTitle.val(eventTitle);
                            var taskDescription = $('#taskdescription');
                            var taskDescriptionValue = taskDescription.val(eventDescription);
                            var taskInputStarttDate = $("#start-date");
                            var taskInputStarttDateValue = taskInputStarttDate.val(info.start.format("YYYY-MM-DD HH:mm:ss"));
                            var taskInputEndDate = $("#end-date");
                            var taskInputEndtDateValue = taskInputEndDate.val(info.end.format("YYYY-MM-DD HH:mm:ss"));
                            var startDate = flatpickr(document.getElementById('start-date'), {
                                enableTime: true,
                                dateFormat: "Y-m-d H:i",
                                defaultDate: info.start.format("YYYY-MM-DD HH:mm:ss"),
                            });
                            var abv = startDate.config.onChange.push(function (selectedDates, dateStr, instance) {
                                var endtDate = flatpickr(document.getElementById('end-date'), {
                                    enableTime: true,
                                    dateFormat: "Y-m-d H:i",
                                    minDate: dateStr
                                });
                            })
                            var endtDate = flatpickr(document.getElementById('end-date'), {
                                enableTime: true,
                                dateFormat: "Y-m-d H:i",
                                defaultDate: info.end.format("YYYY-MM-DD HH:mm:ss"),
                                minDate: info.start.format("YYYY-MM-DD HH:mm:ss")
                            });
                            $('#edit-event').off('click').on('click', function (event) {
                                event.preventDefault();
                                /* Act on the event */
                                var radioValue = $("input[name='marker']:checked").val();
                                var taskStartTimeValue = document.getElementById("start-date").value;
                                var taskEndTimeValue = document.getElementById("end-date").value;
                                info.title = taskTitle.val();
                                info.description = taskDescription.val();
                                info.start = taskStartTimeValue;
                                info.end = taskEndTimeValue;
                                info.className = radioValue;
                                $('#calendar').fullCalendar('updateEvent', info);
                                modal.style.display = "none";

                                document.getElementsByTagName('body')[0].removeAttribute('style');
                                var fd = new FormData();
                                fd.append('title', taskTitle.val());
                                fd.append('start', taskStartTimeValue);
                                fd.append('end', taskEndTimeValue);
                                fd.append('description', taskDescription.val());
                                fd.append('className', radioValue);
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });
                                $.ajax({
                                    type: 'POST',
                                    url: "/TaskTable/update-event/"+info.id,
                                    data: fd,
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    success: (data) => {

                                        document.getElementById("alert").innerHTML = data['message'].substring(0, data['message']
                                            .length);
                                        $('.toast').toast('show');

                                    },
                                    error: function (data) {
                                        console.log(data);
                                    }
                                });
                                modalResetData();
                            });
                        }
                    })


                },
                error: function (data) {
                    console.log(data);
                }
            });

            function createBackdropElement() {
                var btn = document.createElement("div");
                btn.setAttribute('class', 'modal-backdrop fade show')
                document.body.appendChild(btn);
            }
            // Reset radio buttons
            function clearRadioGroup(GroupName) {
                var ele = document.getElementsByName(GroupName);
                for (var i = 0; i < ele.length; i++)
                    ele[i].checked = false;
            }
            // Reset Modal Data on when modal gets closed
            function modalResetData() {
                modal.style.display = "none";
                for (var i = 0; i < input.length; i++) {
                    input[i].value = '';
                }
                for (var j = 0; j < textarea.length; j++) {
                    textarea[j].value = '';
                    i
                }
                clearRadioGroup("marker");
                // Get Modal Backdrop
                var getModalBackdrop = document.getElementsByClassName('modal-backdrop')[0];
                document.body.removeChild(getModalBackdrop)
            }
            // When the user clicks on the button, open the modal
            btn.onclick = function () {
                modal.style.display = "block";
                addEvent.style.display = 'block';
                editEvent.style.display = 'none';
                addEventTitle.style.display = 'block';
                editEventTitle.style.display = 'none';
                document.getElementsByTagName('body')[0].style.overflow = 'hidden';
                createBackdropElement();
                enableDatePicker();
            }
            // Clear Data and close the modal when the user clicks on Discard button
            discardModal.onclick = function () {
                modalResetData();
                document.getElementsByTagName('body')[0].removeAttribute('style');
            }
            // Clear Data and close the modal when the user clicks on <span> (x).
            span.onclick = function () {
                modalResetData();
                document.getElementsByTagName('body')[0].removeAttribute('style');
            }
            // Clear Data and close the modal when the user clicks anywhere outside of the modal.
            window.onclick = function (event) {
                if (event.target == modal) {
                    modalResetData();
                    document.getElementsByTagName('body')[0].removeAttribute('style');
                }
            }
            var newDate = new Date()
            var monthArray = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12']
            function getDynamicMonth(monthOrder) {
                var getNumericMonth = parseInt(monthArray[newDate.getMonth()]);
                var getNumericMonthInc = parseInt(monthArray[newDate.getMonth()]) + 1;
                var getNumericMonthDec = parseInt(monthArray[newDate.getMonth()]) - 1;
                if (monthOrder === 'default') {
                    if (getNumericMonth < 10) {
                        return '0' + getNumericMonth;
                    } else if (getNumericMonth >= 10) {
                        return getNumericMonth;
                    }
                } else if (monthOrder === 'inc') {
                    if (getNumericMonthInc < 10) {
                        return '0' + getNumericMonthInc;
                    } else if (getNumericMonthInc >= 10) {
                        return getNumericMonthInc;
                    }
                } else if (monthOrder === 'dec') {
                    if (getNumericMonthDec < 10) {
                        return '0' + getNumericMonthDec;
                    } else if (getNumericMonthDec >= 10) {
                        return getNumericMonthDec;
                    }
                }
            }
            // Initialize Calendar

            function enableDatePicker() {
                var startDate = flatpickr(document.getElementById('start-date'), {
                    enableTime: true,
                    dateFormat: "Y-m-d H:i",
                    minDate: new Date()
                });
                var abv = startDate.config.onChange.push(function (selectedDates, dateStr, instance) {
                    var endtDate = flatpickr(document.getElementById('end-date'), {
                        enableTime: true,
                        dateFormat: "Y-m-d H:i",
                        minDate: dateStr
                    });
                })
                var endtDate = flatpickr(document.getElementById('end-date'), {
                    enableTime: true,
                    dateFormat: "Y-m-d H:i",
                    minDate: new Date()
                });
            }
            function randomString(length, chars) {
                var result = '';
                for (var i = length; i > 0; --i) result += chars[Math.round(Math.random() * (chars.length - 1))];
                return result;
            }
            $("#add-e").off('click').on('click', function (event) {
                var radioValue = $("input[name='marker']:checked").val();
                var randomAlphaNumeric = randomString(10, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
                var inputValue = $("#write-e").val();
                var inputStarttDate = document.getElementById("start-date").value;
                var inputEndDate = document.getElementById("end-date").value;
                var arrayStartDate = inputStarttDate.split(' ');
                var arrayEndDate = inputEndDate.split(' ');
                var startDate = arrayStartDate[0];
                var startTime = arrayStartDate[1];
                var endDate = arrayEndDate[0];
                var endTime = arrayEndDate[1];
                var concatenateStartDateTime = startDate + 'T' + startTime + ':00';
                var concatenateEndDateTime = endDate + 'T' + endTime + ':00';
                var inputDescription = document.getElementById("taskdescription").value;
                var myCalendar = $('#calendar');
                myCalendar.fullCalendar();
                var myEvent = {
                    timeZone: 'UTC',
                    allDay: false,
                    id: randomAlphaNumeric,
                    title: inputValue,
                    start: concatenateStartDateTime,
                    end: concatenateEndDateTime,
                    className: radioValue,
                    description: inputDescription
                };
                myCalendar.fullCalendar('renderEvent', myEvent, true);
                modal.style.display = "none";
                document.getElementsByTagName('body')[0].removeAttribute('style');


                var fd = new FormData();
                fd.append('title', inputValue);
                fd.append('start', concatenateStartDateTime);
                fd.append('end', concatenateEndDateTime);
                fd.append('description', inputDescription);
                fd.append('className', radioValue);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: "/TaskTable/add-event",
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {

                        document.getElementById("alert").innerHTML = data['message'].substring(0, data['message']
                            .length);
                        $('.toast').toast('show');

                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
                modalResetData();



            });
        });
    })
})(jQuery);
