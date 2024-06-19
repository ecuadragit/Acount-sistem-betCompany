import{T as U,j as B,k as C,o as f,g as h,w as s,a as e,u as l,Z as $,b as o,d as i,i as x,e as j,n as A,c as w,f as y,F as k,t as p}from"./app-5cc5926e.js";import{_ as q}from"./AdminLayout-1046ab22.js";import{_,a as V,b as E}from"./TextInput-95d27e64.js";import{_ as L}from"./PrimaryButton-8d44ca58.js";import{s as T}from"./vue-multiselect.css_vue_type_style_index_0_src_true_lang-461dfd0c.js";import{a as b,b as m,T as D,c}from"./TableDataCell-46bb5f55.js";import"./_plugin-vue_export-helper-c27b6911.js";const F={class:"max-w-7xl mx-auto mt-4"},I={class:"flex justify-between"},M={class:"max-w-6xl mx-auto mt-6 p-6 bg-slate-100"},R={class:"mt-4"},S={class:"mt-4"},z={class:"mt-4"},H={class:"mt-4"},O={class:"flex items-center justify-end mt-4"},P={class:"mt-6 max-w-6xl mx-auto bg-slate-100 shadow-lg rounded-lg p-6"},Z=o("h1",{class:"text-2xl font-semibold text-indigo-700"},"Roles",-1),G={class:"bg-white"},J={class:"mt-6 max-w-6xl mx-auto bg-slate-100 shadow-lg rounded-lg p-6"},K=o("h1",{class:"text-2xl font-semibold text-indigo-700"},"Permissions",-1),Q={class:"bg-white"},ae={__name:"Edit",props:{user:{type:Object,required:!0},roles:Array,permissions:Array},setup(n){var g,v;const u=n,t=U({name:(g=u.user)==null?void 0:g.name,email:(v=u.user)==null?void 0:v.email,roles:[],permissions:[]}),N=()=>{var d;t.put(route("users.update",(d=u.user)==null?void 0:d.id))};return B(()=>{var d,r;t.permissions=(d=u.user)==null?void 0:d.permissions,t.roles=(r=u.user)==null?void 0:r.roles}),C(()=>u.user,()=>{var d,r;t.permissions=(d=u.user)==null?void 0:d.permissions,t.roles=(r=u.user)==null?void 0:r.roles}),(d,r)=>(f(),h(q,null,{default:s(()=>[e(l($),{title:"Create user"}),o("div",F,[o("div",I,[e(l(x),{href:d.route("users.index"),class:"px-3 py-2 text-white font-semibold bg-indigo-500 hover:bg-indigo-700 rounded"},{default:s(()=>[i("Back")]),_:1},8,["href"])])]),o("div",M,[o("form",{onSubmit:j(N,["prevent"])},[o("div",R,[e(_,{for:"name",value:"Name"}),e(V,{id:"name",type:"text",class:"mt-1 block w-full",modelValue:l(t).name,"onUpdate:modelValue":r[0]||(r[0]=a=>l(t).name=a),required:"",autofocus:"",autocomplete:"name"},null,8,["modelValue"]),e(E,{class:"mt-2",message:l(t).errors.name},null,8,["message"])]),o("div",S,[e(_,{for:"email",value:"Email"}),e(V,{id:"email",type:"email",class:"mt-1 block w-full",modelValue:l(t).email,"onUpdate:modelValue":r[1]||(r[1]=a=>l(t).email=a),required:"",autocomplete:"username"},null,8,["modelValue"]),e(E,{class:"mt-2",message:l(t).errors.email},null,8,["message"])]),o("div",z,[e(_,{for:"roles",value:"Roles"}),e(l(T),{modelValue:l(t).roles,"onUpdate:modelValue":r[2]||(r[2]=a=>l(t).roles=a),options:n.roles,multiple:!0,"close-on-select":!0,placeholder:"Pick some",label:"name","track-by":"id"},null,8,["modelValue","options"])]),o("div",H,[e(_,{for:"permissions",value:"Permissions"}),e(l(T),{modelValue:l(t).permissions,"onUpdate:modelValue":r[3]||(r[3]=a=>l(t).permissions=a),options:n.permissions,multiple:!0,"close-on-select":!0,placeholder:"Pick some",label:"name","track-by":"id"},null,8,["modelValue","options"])]),o("div",O,[e(L,{class:A(["ml-4",{"opacity-25":l(t).processing}]),disabled:l(t).processing},{default:s(()=>[i(" Update User ")]),_:1},8,["class","disabled"])])],32)]),o("div",P,[Z,o("div",G,[e(D,null,{header:s(()=>[e(b,null,{default:s(()=>[e(m,null,{default:s(()=>[i("ID")]),_:1}),e(m,null,{default:s(()=>[i("Name")]),_:1}),e(m,null,{default:s(()=>[i("Action")]),_:1})]),_:1})]),default:s(()=>[(f(!0),w(k,null,y(n.user.roles,a=>(f(),h(b,{key:a.id,class:"border-b"},{default:s(()=>[e(c,null,{default:s(()=>[i(p(a.id),1)]),_:2},1024),e(c,null,{default:s(()=>[i(p(a.name),1)]),_:2},1024),e(c,{class:"space-x-4"},{default:s(()=>[e(l(x),{href:d.route("users.roles.destroy",[n.user.id,a.id]),method:"DELETE",as:"button",class:"text-red-400 hover:text-red-600","preserve-scroll":""},{default:s(()=>[i("Revoke")]),_:2},1032,["href"])]),_:2},1024)]),_:2},1024))),128))]),_:1})])]),o("div",J,[K,o("div",Q,[e(D,null,{header:s(()=>[e(b,null,{default:s(()=>[e(m,null,{default:s(()=>[i("ID")]),_:1}),e(m,null,{default:s(()=>[i("Name")]),_:1}),e(m,null,{default:s(()=>[i("Action")]),_:1})]),_:1})]),default:s(()=>[(f(!0),w(k,null,y(n.user.permissions,a=>(f(),h(b,{key:a.id,class:"border-b"},{default:s(()=>[e(c,null,{default:s(()=>[i(p(a.id),1)]),_:2},1024),e(c,null,{default:s(()=>[i(p(a.name),1)]),_:2},1024),e(c,{class:"space-x-4"},{default:s(()=>[e(l(x),{href:d.route("users.permissions.destroy",[n.user.id,a.id]),method:"DELETE",as:"button",class:"text-red-400 hover:text-red-600","preserve-scroll":""},{default:s(()=>[i("Revoke")]),_:2},1032,["href"])]),_:2},1024)]),_:2},1024))),128))]),_:1})])])]),_:1}))}};export{ae as default};