import{T as p,o as u,c,a as s,u as e,w as i,F as f,Z as _,b as a,i as x,d,e as b,n as g}from"./app-5cc5926e.js";import{_ as h}from"./AdminLayout-1046ab22.js";import{_ as v}from"./PrimaryButton-8d44ca58.js";import{_ as w,a as y,b as V}from"./TextInput-95d27e64.js";const $={class:"max-w-7xl mx-auto py-4"},k={class:"flex justify-between"},B={class:"mt-6 max-w-md mx-auto bg-slate-100 shadow-lg rounded-lg p-6"},N=a("h1",{class:"text-2xl p-4"},"Update permission",-1),U={class:"flex items-center mt-4"},q={__name:"Edit",props:{permission:{type:Object,required:!0}},setup(n){var m;const t=p({name:(m=n.permission)==null?void 0:m.name});return(l,o)=>(u(),c(f,null,[s(e(_),{title:"Update permission"}),s(h,null,{default:i(()=>[a("div",$,[a("div",k,[s(e(x),{href:l.route("permissions.index"),class:"px-3 py-2 text-white font-semibold bg-indigo-500 hover:bg-indigo-700 rounded"},{default:i(()=>[d("Back")]),_:1},8,["href"])]),a("div",B,[N,a("form",{onSubmit:o[1]||(o[1]=b(r=>e(t).put(l.route("permissions.update",n.permission.id)),["prevent"]))},[a("div",null,[s(w,{for:"name",value:"Name"}),s(y,{id:"name",type:"text",class:"mt-1 block w-full",modelValue:e(t).name,"onUpdate:modelValue":o[0]||(o[0]=r=>e(t).name=r),autofocus:"",autocomplete:"username"},null,8,["modelValue"]),s(V,{class:"mt-2",message:e(t).errors.name},null,8,["message"])]),a("div",U,[s(v,{class:g(["ml-4",{"opacity-25":e(t).processing}]),disabled:e(t).processing},{default:i(()=>[d(" Update ")]),_:1},8,["class","disabled"])])],32)])])]),_:1})],64))}};export{q as default};
