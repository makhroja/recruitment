$(function () {
  'use strict';

  $('.myDropify').dropify();
});

// $(function () {
//   'use strict'

//   if ($(".select2").length) {
//     $(".select2").select2();
//   }
// });

// $('.getUnitLists').select2({
//   placeholder: 'Select an item',
//   ajax: {
//     url: '{{ route('getUnitLists') }}',
//     dataType: 'json',
//     delay: 250,
//     processResults: function (data) {
//       return {
//         results: $.map(data, function (item) {
//           return {
//             text: item.nama,
//             id: item.id
//           }
//         })
//       };
//     },
//     cache: true
//   }
// });

// $('.getUserLists').select2({
//   placeholder: 'Select an item',
//   ajax: {
//     url: '{{ route('getUserLists') }}',
//     dataType: 'json',
//     delay: 250,
//     processResults: function (data) {
//       return {
//         results: $.map(data, function (item) {
//           return {
//             text: item.name,
//             id: item.id
//           }
//         })
//       };
//     },
//     cache: true
//   }
// });

// $('.getPositionLists').select2({
//   placeholder: 'Select an item',
//   ajax: {
//     url: '{{ route('getPositionLists') }}',
//     dataType: 'json',
//     delay: 250,
//     processResults: function (data) {
//       return {
//         results: $.map(data, function (item) {
//           return {
//             text: item.nama,
//             id: item.id
//           }
//         })
//       };
//     },
//     cache: true
//   }
// });