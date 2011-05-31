/**
 * load page
 */
function load_page(page,params,target)
{
  var url='render.php';
  if(exists(params) == false)
  {
    params=new Object(); 
  }
  
  params['page']=page;

  var html=getajaxhtml(url,params);

  if(exists(target) == false)
  {
    jQuery("#wrapper").html(html);
  }
  else
  {
    jQuery(target).html(html);
  }
}

// show part 1,2,3 or 4
function show_part(index,max)
{
  if(index == max)
  {
    var ret=quiz_check_form(max);
    if(ret == false)
    {
      return false; 
    }
    else
    {
      render_preview();  
    }
  }

  for(var i=0; i<= max; i++)
  {
    jQuery("#part"+i).hide();
    jQuery("#quiz_part_nav_"+i).removeClass("step"+i+"_active");
    jQuery("#quiz_part_nav_"+i).addClass("step"+i);
  }


  jQuery("#part"+index).show();
  jQuery("#quiz_part_nav_"+index).addClass("step"+index+"_active");
  jQuery("#quiz_part_nav_"+index).removeClass("step"+index);
}

function quiz_check_form(max)
{
  if(max == 4)
  {
    if(check_quiz() == false)
      return false;

    if(check_outcome() == false)
      return false;

    if(check_question() == false)
      return false;
  }
  else if(max == 3)
  {
    if(check_quiz() == false)
      return false;

    if(check_question() == false)
      return false;
  }

  return true;
}
function render_preview()
{
  //alert('render_preview');
  submit_quiz_form();
}

function submit_quiz_form()
{
  //submit
  var options={
    url:"docreate_quiz.php",
    method:"POST",
    //dataType:'json',
    success:function(data){
        //alert(data);
        //return false;
      if(data.error==1)
      {
        show_warning(data.error_msg);
      }
      else
      {
        //alert(data.quiz_id);

        //load_page('block/preview.php', {quiz_id:data.quiz_id}, "#quiz_preivew");
        //load_page('block/preview.php', {quiz_id:data.quiz_id}, "#quiz_createWOAY");
        load_page('block/preview.php', {quiz_id:data.quiz_id});
      }
        
    },
    error: function(data)
    {
      show_warning('create quiz failed');
      //alert(data);
    }

  }; 
  var url="docreate_quiz.php";
  var params={
    quiz_name:jQuery("#quiz_name").val(), 
    quiz_image:jQuery("#quiz_image").val(),
    quiz_description:jQuery("#quiz_description").val(),
    quiz_fb_page_id: jQuery("#quiz_fb_page_id").val(),

    last:'',
  };

   var outcomes=new Object();

   var number=count_outcome_number();
   for(var i=1; i<=number;i++)
   {
    var name=jQuery("#outcome_"+i+"_name").val();
    var image=jQuery("#outcome_"+i+"_img").val();
    var description=jQuery("#outcome_"+i+"_description").val();

    outcomes[i]=new Object();
    outcomes[i].name=name;
    outcomes[i].image=image;
    outcomes[i].description=description;
   }

  if(number > 0)
    params.outcomes=outcomes;
   /*
    * array( question[1]=array(
    *  name:
    *  correct:
    *  answers: array(
    *    1: name1
    *    2: name2
    *  )
    * )
    */
   var questions=new Object();

   var q_number=count_question_number();
   for(var i=1; i<=q_number;i++)
   {
      questions[i]=new Object();
      questions[i].name=jQuery("#question_"+i+"_name").val();

      var correct=".q_"+i+"_correct";
      questions[i].correct=jQuery("input."+correct+":checked").val();
      
      questions[i].image='q_image';

      questions[i].answers=new Object(); 
      var a_number=count_answer_number(i);
       for(var j=1;j<=a_number; j++)
       {
          var a_title="#q_"+i+"_answer_"+j+"_name";
          var val=jQuery(a_title).val();

          questions[i].answers[j]=new Object();
          questions[i].answers[j].name=val;

          questions[i].answers[j].image='a_image';
       }
   }


  params.questions=questions;


  jQuery.post(url,params,function(data){
    if(data.error==0)
    {
      //alert(data.quiz_id);
      load_page('block/preview.php', {quiz_id:data.quiz_id}, "#quiz_preview");
    }
    else
    {
      show_warning(data.error_msg); 
    }

  },'json');

  return false;
}

function check_quiz()
{
  var field_selector='#quiz_name';
  if(jQuery(field_selector).val() == false)
  {
    showWarning('no quiz name');
    return false;
  }

  return true;
}

function check_outcome()
{
 var number=count_outcome_number();
 if(number <= 0)
 {
   show_warning("invalid outcome name");
    return false
 }

 for(var i=1; i<=number; i++)
 {
    var name=jQuery("#outcome_"+i+"_name").val();
    var image=jQuery("#outcome_"+i+"_image").val();
    var description=jQuery("#outcome_"+i+"_description").val();

    if(name == false )
    {
      show_warning("invalid outcome "+i+" name");
      return false;
    }

    if(image == false )
    {
      show_warning("invalid outcome "+i+" image");
      return false;
    } 

    if(description == false )
    {
      show_warning("invalid outcome "+i+" description");
      return false;
    }
 }

 return true;
}

function check_question()
{

 var q_number=count_question_number();
 if(q_number <= 0)
 {
    alert('no question');
    return false
 }

 for(var i=1; i<=q_number; i++)
 {
    var val=jQuery("#question_"+i+"_name").val();
    if(val == "Start typing your question" )
    {
      input_clear("#question_"+i+"_name");
      show_warning("question "+i+" is invalid");
      return false;
    }

    //check answers
   var a_number=count_answer_number(i);

   for(var j=1;j<=a_number; j++)
   {
    var a_title="#q_"+i+"_answer_"+j+"_name";
    var val=jQuery(a_title).val();
    if(typeof(val) == 'undefined' || val == false)
    {
      show_warning("question "+i+" answer "+j+" is invalid");
      return false;
    }
   }

  //check correct answer
  var correct=".q_"+i+"_correct";
  if(jQuery("input."+correct+":checked").length == 0)
  {
    show_warning("question "+i+" must have a correct answer"); 
    return false;
  }
 }
 return true;
}

//show waring dialog
function show_warning(msg)
{
  FrdWarning.close();

  FrdWarning.create();
  FrdWarning.setOption('type','ajax');
  FrdWarning.setOption('template','template/frd/warning.phtml');
  FrdWarning.setOption('content',msg);
  FrdWarning.open();

}
//number check
function number_check(max,field_selector,note_selector)
{
  var number=input_number(field_selector);

  var leftnumber=parseInt(max)-parseInt(number);

  if(leftnumber < 0)
    leftnumber=0;

  //update note
  var html=leftnumber+' characters left.';

  sethtml(note_selector,html);
}

//part1 title
function part1_title_check()
{
  var max=100;
  var field_selector='#quiz_name';
  var note_selector='#quiz_name_note';
  
  var val=getvalue(field_selector); 
  if(val == 'Start typing a quiz name')
    input_clear(field_selector);

  number_check(max,field_selector,note_selector);
}

//part1 description
function part1_description_check()
{
  var max=600;
  var field_selector='#quiz_description';
  var note_selector='#quiz_description_note';

  var default_value='Example: This quiz will show you if you are a real celebrity fashionista! Find out now!';
  var val=getvalue(field_selector); 
  if(val == default_value)
    input_clear(field_selector);

  number_check(max,field_selector,note_selector);

}

//part1 description
function part2_question_check()
{
  var max=100;
  var field_selector='#quiz_name';
  var note_selector='#quiz_name_note';

  number_check(max,field_selector,note_selector);
}

function part2_answer_check()
{
  var max=100;
  var field_selector='#quiz_name';
  var note_selector='#quiz_name_note';

  number_check(max,field_selector,note_selector);
}

//show image popup upload form
function part1_show_image_upload()
{
  FrdDialog.close();

  FrdDialog.create();
  FrdDialog.setOption('type','ajax');
  FrdDialog.setOption('template','template/quiz_image.phtml');
  FrdDialog.open();

  //var selector="#quiz_image_popup"; 
  //jQuery(selector).show();
}
//hide image popup upload form
function part1_hide_image_upload()
{
  var selector="#quiz_image_popup"; 
  jQuery(selector).hide();
}

function show_remove_question(q)
{
  jQuery(".question_remove").hide();
  if(q > 1)
  {
    jQuery("#q_"+q+"_remove").show();
  }
}
function remove_question(q)
{
  var selector="#q_"+q;

  jQuery(selector).remove();

  show_remove_question(q-1);
}


 function count_question_number()
 {
    var length=jQuery("input.question_field").length;
    return length;
 }
//add question 
function add_question()
{
 var length=count_question_number();
 var curlength=length+1;

//alert(curlength);
  var url="render.php";
  var params={
    page:'block/question.php', 
    q:curlength,
  };

  jQuery.post(url,params,function(data){
    jQuery("#questions_container").append(data);
    show_remove_question(curlength);
  });
}

//show remove answer link for last answer
function show_remove_answer(q,answer)
{
  jQuery(".q_"+q+"_remove").hide();
  if(answer > 1)
  {
    jQuery("#q_"+q+"_answer_"+answer+"_remove").show();
  }
}
//add answer 
function add_answer(q)
{
 var length=count_answer_number(q);
 var curlength=length+1;

  var url="render.php";
  var params={
    page:'block/answer.php', 
    q:q,
    answer:curlength,
  };

  jQuery.post(url,params,function(data){
    jQuery("#question_"+q+"_answers_container").append(data);
    show_remove_answer(q,curlength);
  });
}
//answer number
function count_answer_number(q)
{
  var length=jQuery("#q_"+q).find("input.answer_field").length;
  return length;
}

// quiz's image upload
function quiz_upload_image()
{
  var selector="#quiz_image_form";
  var note_selector="#quiz_image_form_note";

  if(jQuery(selector+" [name=image]").val() == false)
  {
    sethtml(note_selector,"please choose an image");
    return false;
  }

  //submit
  var options={
    url:"upload.php",
    method:"POST",
    dataType:'json',
    success:function(data){
      if(data.error==1)
      {
        sethtml(note_selector,"please choose an image");
      }
      else
      {
        jQuery("#quiz_result").show();
        jQuery("#quiz_success_image").attr('src',data.path);
      }
        
    },
    error: function(data)
    {
      alert(data);
    }

  }; 

  jQuery(selector).ajaxSubmit(options);
  return false;

}

//save the image in form
function part1_save_image()
{
  var selector="#quiz_uploaded_image";

  var image=jQuery("#quiz_success_image").parent().html();
  var src=jQuery("#quiz_success_image").attr('src');

  jQuery(selector).html(image);
  //outcome_hide_image_upload();

  //save value in  hidden input 
  //jQuery("input[name=quiz_image]").val(src);
  FrdDialog.close();
}

//save the image in form
function part1_remove_image()
{
  var selector="#quiz_uploaded_image";

  jQuery(selector).html('');
  //clear value in  hidden input 
  jQuery("input[name=quiz_image]").val('');
}

//toggle answers
function part2_toggle_answers(obj)
{
   jQuery(obj).parent().find(".q_content").toggle();
  var id='outcome_'+index+'_nav';

  if(jQuery("#"+id).hasClass('enable'))
  {
    jQuery("#"+id).removeClass('enable');
    jQuery("#"+id).addClass('disable');

    jQuery("#outcome_"+index+"_content").hide();
  }
  else
  {
    jQuery("#"+id).removeClass('disable');
    jQuery("#"+id).addClass('enable');


    jQuery("#outcome_"+index+"_content").show();
  }
}

function remove_answer(q,answer)
{
  var selector="#q_"+q+"_answer_"+answer;

  jQuery(selector).remove();

  show_remove_answer(q,answer-1);
}


function question_title_check(q)
{
  var max=100;
  var field_selector='#question_'+q+"_name";
  var note_selector='#question_'+q+"_note";
  
  var val=getvalue(field_selector); 
  if(val == "Start typing your question" )
    input_clear(field_selector);

  number_check(max,field_selector,note_selector);
}

function answer_title_check(q,answer)
{
  var max=100;
  var field_selector='#q_'+q+"_answer_"+answer+"_name";
  var note_selector='#q_'+q+"_answer_"+answer+"_note";
  
  var val=getvalue(field_selector); 

  number_check(max,field_selector,note_selector);
}

//show image upload form
function show_question_image_popup(q)
{
  FrdDialog.close();

  FrdDialog.create();
  FrdDialog.setOption('type','ajax');
  FrdDialog.setOption('template','template/question_image.phtml');
  FrdDialog.setOption('q',q);
  FrdDialog.open();
}

function question_show_image_upload(q)
{
  var selector="#question_"+q+"_image_popup"; 
  jQuery(selector).show();
}

function question_hide_image_upload(q)
{
  var selector="#question_"+q+"_image_popup"; 
  jQuery(selector).hide();
}

function question_upload_image(q)
{
  var selector="#question_"+q+"_image_form";
  var note_selector="#question_"+q+"_image_form_note";

  if(jQuery(selector+" [name=image]").val() == false)
  {
    sethtml(note_selector,"please choose an image");
    return false;
  }

  //submit
  var options={
    url:"question_upload.php",
    method:"POST",
    dataType:'json',
    success:function(data){
      if(data.error==1)
      {
        sethtml(note_selector,"please choose an image");
      }
      else
      {
        jQuery("#question_"+q+"_result").show();
        jQuery("#question_"+q+"_success_image").attr('src','/Quiz'+data.path);
      }
        
    },
    error: function(data)
    {
      alert(data);
    }

  }; 

//alert(selector);
 //alert(jQuery(selector).html());
  jQuery(selector).ajaxSubmit(options);
  return false;
}

function question_save_image(q)
{
  var selector="#question_"+q+"_thumbnails";

  var src=jQuery("#question_"+q+"_success_image").attr('src');

  //alert(selector);
  //alert(src);
  jQuery(selector).attr('src',src);
  question_hide_image_upload(q);

  //save value in  hidden input 
  jQuery("input[name=question_"+q+"_image]").val(src);

  //show delete 
  jQuery("#question_"+q+"_remove_img").show();
  jQuery("#question_"+q+"_upload").hide();
}

function question_remove_image(q)
{
  var selector="#question_"+q+"_thumbnails";

  var src="http://d1bye8fl443jlj.cloudfront.net/prod/images/quiz_create_part2-img.gif";

  //alert(selector);
  //alert(src);
  jQuery(selector).attr('src',src);

  jQuery("input[name=question_"+q+"_image]").val('');
  jQuery("#question_"+q+"_remove_img").hide();
  jQuery("#question_"+q+"_upload").show();
}

//answer image form

function show_answer_image_popup(q,answer)
{
  //var selector="#q_"+q+"_"+answer+"_image_popup"; 
  //jQuery(selector).show();
  FrdDialog.close();

  FrdDialog.create();
  FrdDialog.setOption('type','ajax');
  FrdDialog.setOption('template','template/answer_image.phtml');
  FrdDialog.setOption('q',q);
  FrdDialog.setOption('answer',answer);
  FrdDialog.open();

}

function answer_hide_image_upload(q,answer)
{
  var selector="#q_"+q+"_"+answer+"_image_popup"; 
  jQuery(selector).hide();
}

function answer_upload_image(q,answer)
{
  var selector="#q_"+q+"_"+answer+"_image_form";
  var note_selector="#q_"+q+"_"+answer+"_image_form_note";

  if(jQuery(selector+" [name=image]").val() == false)
  {
    sethtml(note_selector,"please choose an image");
    return false;
  }

  //submit
  var options={
    url:"answer_upload.php",
    method:"POST",
    dataType:'json',
    success:function(data){
      if(data.error==1)
      {
        sethtml(note_selector,"please choose an image");
      }
      else
      {
        jQuery("#q_"+q+"_"+answer+"_result").show();
        jQuery("#q_"+q+"_"+answer+"_success_image").attr('src','/Quiz'+data.path);
      }
        
    },
    error: function(data)
    {
      alert(data);
    }

  }; 

//alert(selector);
 //alert(jQuery(selector).html());
  jQuery(selector).ajaxSubmit(options);
  return false;
}

function answer_save_image(q,answer)
{
  var selector="#q_"+q+"_answer_"+answer+"_thumbnails";

  var src=jQuery("#q_"+q+"_"+answer+"_success_image").attr('src');

  //alert(selector);
  //alert(src);
  jQuery(selector).attr('src',src);
  answer_hide_image_upload(q,answer);

  //save value in  hidden input 
  jQuery("input[name=q_"+q+"_answer_"+answer+"_img]").val(src);

  //show delete 
  jQuery("#q_"+q+"_answer_"+answer+"_remove_image").show();

  jQuery("#q_"+q+"_answer_"+answer+"_upload").hide();
}

function answer_remove_image(q,answer)
{
  var selector="#q_"+q+"_answer_"+answer+"_thumbnails";

  var src="http://d1bye8fl443jlj.cloudfront.net/prod/images/quiz_create_part2-img.gif";

  //alert(selector);
  //alert(src);
  jQuery(selector).attr('src',src);

  jQuery("input[name=q_"+q+"_answer_"+answer+"_img]").val('');

  jQuery("#q_"+q+"_answer_"+answer+"_remove_image").hide();
  jQuery("#q_"+q+"_answer_"+answer+"_upload").show();
}


/** outcome */
function toggle_outcome(index)
{
  var id='outcome_'+index+'_nav';

  if(jQuery("#"+id).hasClass('enable'))
  {
    jQuery("#"+id).removeClass('enable');
    jQuery("#"+id).addClass('disable');

    jQuery("#outcome_"+index+"_content").hide();
  }
  else
  {
    jQuery("#"+id).removeClass('disable');
    jQuery("#"+id).addClass('enable');


    jQuery("#outcome_"+index+"_content").show();
  }
}

//count outcome
function count_outcome_number()
{
  var length=jQuery("input.outcome_field").length;
  return length;
}

function show_remove_outcome(number)
{
  jQuery(".outcome_remove").hide();
  if(number > 1)
  {
    jQuery("#outcome_"+number+"_remove").show();
  }
}

//add outcome 
function add_outcome()
{
 var length=count_outcome_number();
 var curlength=length+1;

  var url="render.php";
  var params={
    page:'block/outcome.php', 
    number:curlength,
  };

  jQuery.post(url,params,function(data){
    jQuery("#outcomes_container").append(data);
    show_remove_outcome(curlength);
  });
}

//show image 
function outcome_show_image_upload(number)
{
  FrdDialog.close();

  FrdDialog.create();
  FrdDialog.setOption('type','ajax');
  FrdDialog.setOption('template','template/outcome_image.phtml');
  FrdDialog.setOption('number',number);
  FrdDialog.open();

  //var selector="#quiz_image_popup"; 
  //jQuery(selector).show();
}

//save the image in form
function outcome_save_image(number)
{
  var selector="#outcome_"+number+"_thumbnails";

  var image=jQuery("#outcome_"+number+"_success_image").parent().html();
  var src=jQuery("#outcome_"+number+"_success_image").attr('src');


  jQuery(selector).attr('src',src);
  //jQuery(selector).html(image);

  //save value in  hidden input 
  jQuery("#outcome_"+number+"_img").val(src);
  FrdDialog.close();

  jQuery("#outcome_"+number+"_remove_img").show();
  //jQuery("#outcome_"+number+"_upload").hide();
}
function outcome_remove_image(number)
{
  var selector="#outcome_"+number+"_thumbnails";

  var src="http://d1bye8fl443jlj.cloudfront.net/prod/images/quiz_create_part2-img.gif";

  jQuery(selector).attr('src',src);

  jQuery("#outcome_"+number+"_img").val('');

  jQuery("#outcome_"+number+"_remove_img").hide();
  //jQuery("#question_"+q+"_upload").show();
}

// quiz's image upload
function outcome_upload_image(number)
{
  var selector="#outcome_"+number+"_image_form";
  var note_selector="#outcome_"+number+"_image_form_note";

  if(jQuery(selector+" [name=image]").val() == false)
  {
    sethtml(note_selector,"please choose an image");
    return false;
  }

  //submit
  var options={
    url:"upload.php",
    method:"POST",
    dataType:'json',
    success:function(data){
      if(data.error==1)
      {
        sethtml(note_selector,"please choose an image");
      }
      else
      {
        jQuery("#outcome_"+number+"_result").show();

        //alert(jQuery("#outcome_"+number+"_success_image").html());
        jQuery("#outcome_"+number+"_success_image").attr('src',data.path);
      }
        
    },
    error: function(data)
    {
      alert(data);
    }

  }; 

  jQuery(selector).ajaxSubmit(options);
  return false;

}

function remove_outcome(number)
{
  var selector="#outcome_"+number;

  jQuery(selector).remove();

  show_remove_outcome(number-1);
}

/* talk page */
 
function next_question()
{
  var next= curquestion+1;

  if(jQuery("#question_"+next).html() == null)
  {
    return false; 
  }

  jQuery("#question_"+curquestion).hide();
  curquestion=curquestion+1;

  jQuery("#question_"+curquestion).show();

  if(curquestion > 0)
    jQuery("#show_previous").show();
}
function previous_question()
{
  var next= curquestion-1;

  if(jQuery("#question_"+next).html() == null)
  {
    return false; 
  }

  jQuery("#question_"+curquestion).hide();
  curquestion=curquestion-1;
  jQuery("#question_"+curquestion).show();
}
