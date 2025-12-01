"use strict";
var KTFormsFlatpickrDemos = {
	init: function(t) {
		$("#date").flatpickr({
			dateFormat: "Y-m-d",
			allowInput: true
		});

		$("#kt_datepicker_5").flatpickr({
			onReady: function() {
				this.jumpToDate("2025-01")
			},
			dateFormat: "Y-m-d",
			disable: [{
				from: "2025-01-05",
				to: "2025-01-25"
			}, {
				from: "2025-02-03",
				to: "2025-02-15"
			}]
		}), $("#kt_datepicker_6").flatpickr({
			onReady: function() {
				this.jumpToDate("2025-01")
			},
			mode: "multiple",
			dateFormat: "Y-m-d",
			defaultDate: ["2025-01-05", "2025-01-10"]
		}), $("#kt_datepicker_7").flatpickr({
			altInput: !0,
			altFormat: "F j, Y",
			dateFormat: "Y-m-d",
			mode: "range",
			// minDate: "2024-08-19",       // tanggal sebelum 19 Agustus 2024 disabled
			// defaultDate: "2024-08-19"    // langsung aktif tanggal 19 Agustus 2024
		}), $("#time").flatpickr({
			enableTime: !0,
			noCalendar: !0,
			dateFormat: "H:i",
		}), $("#kt_datepicker_9").flatpickr({
			weekNumbers: !0
		}), $("#kt_datepicker_10").flatpickr()
	}
};
KTUtil.onDOMContentLoaded((function() {
	KTFormsFlatpickrDemos.init()
}));