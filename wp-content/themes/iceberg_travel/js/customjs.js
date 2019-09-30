jQuery(document).ready(function($){
   /*custom added fields*/
    if($('textarea').is('.wp-editor-area.theEditor')){
      CKEDITOR.replace(document.querySelector(".wp-editor-area.theEditor"));    
    }
    if($('textarea').is('#acf-field-activity_content')){
      CKEDITOR.replace( 'acf-field-activity_content');  
    }
    if($('textarea').is('#acf-field-trip_excluded')){
      CKEDITOR.replace( 'acf-field-trip_excluded');    
    }
    if($('textarea').is('#acf-field-trip_included')){
      CKEDITOR.replace( 'acf-field-trip_included');    
    }
    if($('textarea').is('#acf-field-itenary')){
      CKEDITOR.replace( 'acf-field-itenary');    
    }
    if($('textarea').is('#acf-field-fixed_departure_content')){
      CKEDITOR.replace( 'acf-field-fixed_departure_content');      
    }
    if($('textarea').is('#acf-field-others')){
      CKEDITOR.replace( 'acf-field-others');
    }
});
