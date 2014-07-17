$(function () {
$('#dpStart').datepicker ({
            todayBtn: "linked",
              language: "ru",
              //startDate: "<?=date('d/m/Y')?>",
              startDate: Date(),
              
        }
        ).on ('changeDate', function (e) {
		$('#dpEnd').datepicker ('setStartDate', e.date);
	})

	$('#dpEnd').datepicker (
            {
              todayBtn: "linked",
              language: "ru",
               startDate:   Date(),
              
            }
            
            ).on ('changeDate', function (e) {
		$('#dpStart').datepicker ('setEndDate', e.date)
	})
        
})