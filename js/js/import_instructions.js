//require <jquery.packed.js>
//require <xatajax.form.core.js>
//require <ckeditor.js>
(function(){
	var $ = jQuery;
	var findField = XataJax.form.findField;
	
	registerXatafaceDecorator(function(node){
		var importBtn = $('button.import-job-posting-instructions', node);
		var fields = {
			semester_id : findField(importBtn, 'semester_id'),
			job_type : findField(importBtn, 'job_type'),
			department_id : findField(importBtn, 'department_id')
		};
		
		importBtn.click(function(e){
			alert("here!");
			var q = {
				'-action' : 'export_json',
				'-table' : 'job_postings',
				'-limit' : 1,
				'-mode' : 'browse',
				'-sort' : 'semester_id desc',
				'department_id' : '',
				'job_type' : '',
				'semester_id' : '',
				'--fields' : 'instructions'
			};
			
			if ( $(fields.semester_id).val() ){
				q.semester_id = '<'+$(fields.semester_id).val();
			}
			if ( $(fields.department_id).val() ){
				q.department_id = '='+$(fields.department_id).val();
			} else {
				alert('Please select a department first');
				return false;
			}
			
			if ( $(fields.job_type).val() ){
				q.job_type = '='+$(fields.job_type).val();
			} else {
				alert('Please select a job type first.');
				return false;
			}
			
			$.get(DATAFACE_SITE_HREF, q, function(res){
				if ( res && res.length > 0 ){
					var instructionsField = CKEDITOR.instances['instructions'];
					if ( instructionsField ){
						instructionsField.setData(res[0].instructions);
					}
					
				} else {
					alert('No previous instructions were found');
				}
			});
			
			e.preventDefault();
		
		});
		
		
		
	});
	
})();