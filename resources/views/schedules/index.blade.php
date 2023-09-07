@extends('layout.master')

@push('plugin-styles')
<link href="{{ asset('assets/plugins/fullcalendar/fullcalendar.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-3 d-none d-md-block">
        <div class="card">
          <div class="card-body">
            <h6 class="card-title mb-4">Tahapan Seleksi</h6>
            <div id='external-events' class='external-events'>
              <div id='external-events-listing'>
                @foreach ($titles as $item)
                <div class='fc-event' data-id="{{ $item['id'] }}">{{ $item['title'] }}</div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-9">
        <div class="card">
          <div class="card-body">
            <div class="form-group {{ $errors->has('job_id') ? 'has-error' : '' }} mb-4">
              <div class="col-md-12">
                <label for="">Pilih Lowongan</label>
                <select style="width:100%" class="form-control select2 @error('job_id') is-invalid @enderror" id="job_id2" name="job_id2">
                  <option value="" style="display: none;" disabled selected>
                    Pilih Lowongan</option>
                  @foreach ($jobs as $job)
                  <option value="{{  $job->id }}" {{ old('job_id') }}>
                    {{ $job->judul }}
                  </option>
                  @endforeach
                </select>
              </div>
            </div>
            <div id='calendar'></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form id="data-form">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="eventModalTitle">Jadwal Seleksi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          @csrf
          <input type="hidden" name="id" id="id" class="form-control" required>
          <input type="hidden" name="job_id" id="job_id" class="form-control" required>
          <input type="hidden" name="title" id="title" class="form-control" required>
          <div class="form-group">
            <label for="job_id">Seleksi</label>
            <select id="tahapan_id" name="tahapan_id">
              <option value="">Pilih Tahapan</option>
              <option value="1">Pengumpulan Berkas Lamaran</option>
              <option value="2">Seleksi Administrasi</option>
              <option value="3">Pengumuman Lolos Seleksi Administrasi</option>
              <option value="4">Tes Tertulis, Wawancara Unit & Praktek</option>
              <option value="5">Pengumuman Lolos Wawancara Unit & Praktek</option>
              <option value="6">Wawancara HRD</option>
              <option value="7">Pengumuman Lolos Wawancara HRD</option>
              <option value="8">Psikotes</option>
              <option value="9">Pengumuman Lolos Psikotes</option>
              <option value="10">Wawancara Performance</option>
              <option value="11">Pengumuman Lolos Wawancara Performance</option>
              <option value="12">Tes Kesehatan</option>
              <option value="13">Pengumuman Tes Kesehatan & Tahap Akhir</option>
            </select>
          </div>

          <div class="form-group">
            <label for="start">Tanggal Mulai</label>
            <input type="date" name="start" id="start" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="end">Tanggal Selesai</label>
            <input type="date" name="end" id="end" class="form-control" required>
          </div>
          <button type="button" id="save-button" class="btn btn-primary">Simpan</button>
          <button type="button" id="update-button" class="btn btn-primary">Update</button>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </form>
  </div>
</div>
@endsection

@push('plugin-scripts')
<script src="{{ asset('assets/plugins/jquery-ui-dist/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/plugins/fullcalendar/fullcalendar.min.js') }}"></script>
<script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
@endpush

@push('custom-scripts')
<script>
  $(document).ready(function() {

    var JobId = 0;
    var url = "{{ URL::to('get-schedules') }}" + "/" + JobId;

    var calendar = $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month'
      },
      navLinks: true,
      editable: true,
      // events: "{{ URL::to('schedules') }}" + "/" + JobId,
      displayEventTime: false,
      eventRender: function(event, element, view) {
        if (event.allDay === 'true') {
          event.allDay = true;
        } else {
          event.allDay = false;
        }
      },
      selectable: true,
      selectHelper: true,
      select: function(start, end, allDay) {
        const jobsValue = $("#job_id2").val();

        if (jobsValue == null) {
          swal({
            icon: 'info',
            title: 'Lowongan belum di pilih'
          });
        } else {
          $('#update-button').hide();
          $('#save-button').show();;

          var start = moment(start, 'DD.MM.YYYY').format('YYYY-MM-DD');
          var end = moment(end, 'DD.MM.YYYY').format('YYYY-MM-DD');

          $("#data-form")[0].reset();
          $('#job_id').val(jobsValue);
          $('#start').val(start);
          $('#end').val(end);

          $('#eventModal').modal('show');
        }

      },
      eventClick: function(event) {
        var start = event.start.format('YYYY-MM-DD');
        var end = event.end.format('YYYY-MM-DD');

        const tableHtml = `
              <tr>
                <td>Seleksi : ` + event.title + `</td>
              </tr>
              <br>
              <tr>
                <td>Mulai : ` + start + `</td>
              </tr>
              <br>
              <tr>
                <td>Berakhir : ` + end + `</td>
              </tr>
        `;
        swal({
          title: 'Jadwal Seleksi',
          content: {
            element: "div",
            attributes: {
              innerHTML: tableHtml
            }
          },
          // icon: "info",
          buttons: {
            delete: {
              text: "Hapus",
              value: "delete",
              className: "btn-danger"
            },
            edit: {
              text: "Edit",
              value: "edit",
              className: "btn-primary",
            },
          },
        }).then((value) => {
          switch (value) {
            case "edit":
              $('#update-button').show();
              $('#save-button').hide();;

              console.log(event)
              var start = event.start.format('YYYY-MM-DD');
              var end = event.end.format('YYYY-MM-DD');

              $('#id').val(event.id);
              $('#job_id').val(event.job_id);
              $('#tahapan_id').val(event.tahapan_id);
              $('#title').val(event.title);
              $('#start').val(start);
              $('#end').val(end);

              $('#eventModal').modal('show');

              break;
            case "delete":
              $.ajax({
                type: "POST",
                url: "{{ URL::to('deleteevent') }}",
                data: {
                  id: event.id,
                  _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                  $('#calendar').fullCalendar('refetchEvents');
                  console.log('Success:', response);
                  swal({
                    icon: 'success',
                    title: 'Jadwal dihapus'
                  });
                },
                error: function(xhr, status, error) {
                  console.log(error)
                  swal({
                    icon: 'info',
                    title: 'Something went wrong!'
                  });
                }
              });
              break;
            default:
              // swal("Anda tidak memilih tindakan apa pun.");
          }
        });
      }
    });

    $('#save-button').click(function() {
      const data = $('#data-form').serialize();

      $.ajax({
        url: "{{ URL::to('createevent') }}",
        type: 'POST',
        data: data,
        success: function(response) {
          $('#calendar').fullCalendar('refetchEvents');
          $('#eventModal').modal('hide');
          console.log('Success:', response);
          swal({
            icon: 'success',
            title: 'Jadwal ' + response.title + ' disimpan'
          });
        },
        error: function(xhr, status, error) {
          console.log(error)
          swal({
            icon: 'info',
            title: 'Something went wrong!'
          });
        }
      });

    });

    $('#update-button').click(function() {
      var data = $('#data-form').serialize();

      $.ajax({
        url: "{{ URL::to('updateevent') }}",
        type: 'POST',
        data: data,
        success: function(response) {
          $('#calendar').fullCalendar('refetchEvents');
          $('#eventModal').modal('hide');
          console.log('Success:', response);
          swal({
            icon: 'success',
            title: 'Jadwal ' + response.title + ' diubah'
          });
        },
        error: function(xhr, status, error) {
          console.log(error)
          swal({
            icon: 'info',
            title: 'Something went wrong!'
          });
        }
      });

    });

    const $selectElement = $("#tahapan_id");
    $selectElement.on("change", function() {

      const selectedOption = $selectElement.find("option:selected");

      const selectedValue = selectedOption.val();
      const selectedText = selectedOption.text();

      $('#title').val(selectedText);
    });


    const $jobsSelect = $("#job_id2");
    $jobsSelect.on("change", function() {
      getEvent()
    });


    $('.fc-event').css('background', '#f3f3fe')
    $('.fc-event').css('border-left', '3px solid #727cf5')
    $(".select2").select2();
  });
</script>

<script>
  var eventSource = null; // Variable to store the current event source

  function getEvent() {
    var selectElement = document.getElementById("job_id2");
    var JobId = selectElement.value;
    var url = "{{ URL::to('get-schedules') }}" + "/" + JobId;

    var calendar = $('#calendar').fullCalendar('getCalendar');

    if (eventSource) {
      calendar.removeEventSource(eventSource);
    }

    eventSource = {
      url: url,
      color: getRandomColor(),
    };

    calendar.addEventSource(eventSource);

    calendar.refetchEvents();
  }

  function getRandomColor() {
    const colors = ["#FFC0CB", "#ADD8E6", "#98FB98", "#B19CD9", "#FFFACD", "#FFD700"];
    const randomIndex = Math.floor(Math.random() * colors.length);
    return colors[randomIndex];
  }
</script>

@endpush