@php
    $notices = App\Models\Notice::get();
@endphp
@include('index')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>نافذة الحق</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="icon" href="/img/icon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    <div class="addMessage hh">
        <x-landing-section_head />
        <x-admin_navbar/>
        <div class="testFormOne">
          @if ($errors->any())
              <div class="theErrorsSection">تعبئة أو اختيار كل حقول الإدخال باللون الأحمر</div>
          @endif
      </div>
        <div class="formSection">
            <h1>ملئ طلب المطبوعات</h1>
            
            <span style="font-size: 12px">(*) يجب ملء الخانات التي تحتوي على</span>
            <form action='{{ route('imprime.send') }}' method="POST">
                @csrf


                <div class="inputLabel">                     
                    <input type="hidden" name="typeF" value="" id="type">                   
                    <select name="" id="rara" multiple multiselect-search="true" multiselect-select-all="true" onchange="showR()">
                      <option value="كتاب">كتاب</option>
                      <option value="مجلة">مجلة</option>
                      <option value="صحيفة">صحيفة</option>
                      <option value="بوستر">بوستر</option>
                      <option value="نشرة">نشرة</option>
                      <option value="منشور">منشور</option>
                      <option value="بروشور">بروشور</option>
                      <option value="كتيب">كتيب</option>
                      <option value="ملصق">ملصق</option>
                      <option value="بطاقة عمل">بطاقة عمل</option>
                    </select>
                    <label for="" class="input-label" id="select" style="top: 0; background: white; padding: 0 5px; color: green"><span>*  </span>نوعية الأداة المطلوبة</label>
                </div>



                <div class="inputLabel inputContainer">
              </div>


                <div class="inputLabel">
                    <input type="text" id="u" class="input-field @if($errors->has('whyI')) errorInput @endif" name="whyI" onchange="handleCheck('u','i')">
                    <label for="" class="input-label" id="i"><span>*  </span>دواعي الإستعمال</label>
                </div>
<div style="margin-top: 30px">
    <button type="submit">حفظ</button></div>
            </form>
        </div>  
    </div>
<x-foo_ter/>



<script>
    var style = document.createElement('style');
    style.setAttribute("id","multiselect_dropdown_styles");
    style.innerHTML = `
    .multiselect-dropdown{
      display: inline-block;
      padding: 4px 10px;
      border-radius: 4px;
      border: solid 1px #bfbfbf;
      transition: border-color 0.3s ease;
      background-color: white;
      position: relative;
      background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
      background-repeat: no-repeat;
      background-position: left .75rem center;
      background-size: 16px 12px;
      width: 40%
    }
    .multiselect-dropdown span.optext, .multiselect-dropdown span.placeholder{
      margin-right:0.5em; 
      margin-bottom:2px;
      padding:1px 0; 
      border-radius: 4px; 
      display:inline-block;
    }
    .multiselect-dropdown span.optext{
      background-color:lightgray;
      padding:1px 0.75em; 
    }
    .multiselect-dropdown span.optext .optdel {
      float: right;
      margin: 0 -6px 1px 5px;
      font-size: 0.7em;
      margin-top: 2px;
      cursor: pointer;
      color: #666;
    }
    .multiselect-dropdown span.optext .optdel:hover { color: #c66;}
    .multiselect-dropdown span.placeholder{
      color:#ced4da;
    }
    .multiselect-dropdown-list-wrapper{
      box-shadow: gray 0 3px 8px;
      z-index: 100;
      padding:2px;
      border-radius: 4px;
      border: solid 1px #ced4da;
      display: none;
      margin: -1px;
      position: absolute;
      top:0;
      left: 0;
      right: 0;
      background: white;
    }
    .multiselect-dropdown-list-wrapper .multiselect-dropdown-search{
      margin-bottom:5px;
    }
    .multiselect-dropdown-list{
      padding:2px;
      height: 15rem;
      overflow-y:auto;
      overflow-x: hidden;
    }
    .multiselect-dropdown-list::-webkit-scrollbar {
      width: 6px;
    }
    .multiselect-dropdown-list::-webkit-scrollbar-thumb {
      background-color: #bec4ca;
      border-radius:3px;
    }
    
    .multiselect-dropdown-list div{
      padding: 5px;
    }
    .multiselect-dropdown-list input{
        float: left;
      height: 1.15em;
      width: 1.15em;
      margin-right: 0.35em;
    }
    .multiselect-dropdown-list div.checked{
    }
    .multiselect-dropdown-list div:hover{
      background-color: #ced4da;
    }
    
    .multiselect-dropdown span.maxselected {width:100%;}
    .multiselect-dropdown-all-selector {border-bottom:solid 1px #999;}
    `;
    document.head.appendChild(style);
    
    function MultiselectDropdown(options){
      var config={
        search:true,
        height:'15rem',
        placeholder:'select',
        txtSelected:'selected',
        txtAll:'الكل',
        txtRemove: 'حذف',
        txtSearch:'بحث',
        ...options
      };
      function newEl(tag,attrs){
        var e=document.createElement(tag);
        if(attrs!==undefined) Object.keys(attrs).forEach(k=>{
          if(k==='class') { Array.isArray(attrs[k]) ? attrs[k].forEach(o=>o!==''?e.classList.add(o):0) : (attrs[k]!==''?e.classList.add(attrs[k]):0)}
          else if(k==='style'){  
            Object.keys(attrs[k]).forEach(ks=>{
              e.style[ks]=attrs[k][ks];
            });
           }
          else if(k==='text'){attrs[k]===''?e.innerHTML='&nbsp;':e.innerText=attrs[k]}
          else e[k]=attrs[k];
        });
        return e;
      }
    
      
      document.querySelectorAll("select[multiple]").forEach((el,k)=>{
        
        var div=newEl('div',{class:'multiselect-dropdown'});
        el.style.display='none';
        el.parentNode.insertBefore(div,el.nextSibling);
        var listWrap=newEl('div',{class:'multiselect-dropdown-list-wrapper'});
        var list=newEl('div',{class:'multiselect-dropdown-list',style:{height:config.height}});
        var search=newEl('input',{class:['multiselect-dropdown-search'].concat([config.searchInput?.class??'form-control']),style:{width:'100%',display:el.attributes['multiselect-search']?.value==='true'?'block':'none'},placeholder:config.txtSearch});
        listWrap.appendChild(search);
        div.appendChild(listWrap);
        listWrap.appendChild(list);
    
        el.loadOptions=()=>{
          list.innerHTML='';
          
          if(el.attributes['multiselect-select-all']?.value=='true'){
            var op=newEl('div',{class:'multiselect-dropdown-all-selector'})
            var ic=newEl('input',{type:'checkbox'});
            op.appendChild(ic);
            op.appendChild(newEl('label',{text:config.txtAll}));
      
            op.addEventListener('click',()=>{
              op.classList.toggle('checked');
              op.querySelector("input").checked=!op.querySelector("input").checked;
              
              var ch=op.querySelector("input").checked;
              list.querySelectorAll(":scope > div:not(.multiselect-dropdown-all-selector)")
                .forEach(i=>{if(i.style.display!=='none'){i.querySelector("input").checked=ch; i.optEl.selected=ch}});
      
              el.dispatchEvent(new Event('change'));
            });
            ic.addEventListener('click',(ev)=>{
              ic.checked=!ic.checked;
            });
      
            list.appendChild(op);
          }
    
          Array.from(el.options).map(o=>{
            var op=newEl('div',{class:o.selected?'checked':'',optEl:o})
            var ic=newEl('input',{type:'checkbox',checked:o.selected});
            op.appendChild(ic);
            op.appendChild(newEl('label',{text:o.text}));
    
            op.addEventListener('click',()=>{
              op.classList.toggle('checked');
              op.querySelector("input").checked=!op.querySelector("input").checked;
              op.optEl.selected=!!!op.optEl.selected;
              el.dispatchEvent(new Event('change'));
            });
            ic.addEventListener('click',(ev)=>{
              ic.checked=!ic.checked;
            });
            o.listitemEl=op;
            list.appendChild(op);
          });
          div.listEl=listWrap;
    
          div.refresh=()=>{
            div.querySelectorAll('span.optext, span.placeholder').forEach(t=>div.removeChild(t));
            var sels=Array.from(el.selectedOptions);
            if(sels.length>(el.attributes['multiselect-max-items']?.value??5)){
              div.appendChild(newEl('span',{class:['optext','maxselected'],text:sels.length+' '+config.txtSelected}));          
            }
            else{
              sels.map(x=>{
                var c=newEl('span',{class:'optext',text:x.text, srcOption: x});
                if((el.attributes['multiselect-hide-x']?.value !== 'true'))
                  c.appendChild(newEl('span',{class:'optdel',text:'🗙',title:config.txtRemove, onclick:(ev)=>{c.srcOption.listitemEl.dispatchEvent(new Event('click'));div.refresh();ev.stopPropagation();}}));
    
                div.appendChild(c);
              });
            }
            if(0==el.selectedOptions.length) div.appendChild(newEl('span',{class:'placeholder',text:el.attributes['placeholder']?.value??config.placeholder}));
          };
          div.refresh();
        }
        el.loadOptions();
        
        search.addEventListener('input',()=>{
          list.querySelectorAll(":scope div:not(.multiselect-dropdown-all-selector)").forEach(d=>{
            var txt=d.querySelector("label").innerText.toUpperCase();
            d.style.display=txt.includes(search.value.toUpperCase())?'block':'none';
          });
        });
    
        div.addEventListener('click',()=>{
          div.listEl.style.display='block';
          search.focus();
          search.select();
        });
        
        document.addEventListener('click', function(event) {
          if (!div.contains(event.target)) {
            listWrap.style.display='none';
            div.refresh();
          }
        });    
      });
    }
    window.addEventListener('load',()=>{
      MultiselectDropdown(window.MultiselectDropdownOptions);
    });
    
    
    
    function showR() {
        let input = document.getElementById('type')
        let select = document.getElementById('rara');
        let selectedOptions = Array.from(select.selectedOptions);
        let inputContainer = document.querySelector('.inputContainer');
        let selectedValues = selectedOptions.map(option => option.value);


        
inputContainer.innerHTML = '';

for (let i = 0; i < selectedOptions.length; i++) {
    let inputDiv = document.createElement('div');

    let input = document.createElement('input');
    input.type = 'number';
    input.name = 'input_values[]'; 
    input.setAttribute('data-option', selectedOptions[i].value);
    input.placeholder = 'الكمية المطلوبة من ' + selectedOptions[i].textContent;

    inputDiv.appendChild(input);

    inputContainer.appendChild(inputDiv);
}

        
        input.value = selectedValues
    }
</script>



    <script src="/js/main.js"></script>

    <script>
      document.addEventListener("DOMContentLoaded", function() {
          document.title = document.title + ' - ' + 'قائمة-طلبات-المطبوعات';
      });
    </script>
</body>
</html>