import{s as h,m as w,y as x,o as d,c as y,T as v,g as c,w as m,a as t,u as s,Z as V,t as $,h as f,b as r,i as B,d as p,n as C,e as N}from"./app-5cc5926e.js";import{_ as U}from"./GuestLayout-54af1017.js";import{_ as g,a as k,b as _}from"./TextInput-95d27e64.js";import{_ as q}from"./PrimaryButton-8d44ca58.js";import"./ApplicationLogo-29f59a48.js";import"./_plugin-vue_export-helper-c27b6911.js";const L=["value"],P={__name:"Checkbox",props:{checked:{type:[Array,Boolean],default:!1},value:{default:null}},emits:["update:checked"],setup(l,{emit:e}){const n=e,i=l,a=h({get(){return i.checked},set(o){n("update:checked",o)}});return(o,u)=>w((d(),y("input",{type:"checkbox",value:l.value,"onUpdate:modelValue":u[0]||(u[0]=b=>a.value=b),class:"rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"},null,8,L)),[[x,a.value]])}},R={key:0,class:"mb-4 font-medium text-sm text-green-600"},S={class:"mt-4"},D={class:"block mt-4"},E={class:"flex items-center"},F=r("span",{class:"ml-2 text-sm text-gray-600 dark:text-gray-400"},"Remember me",-1),M={class:"flex items-center justify-end mt-4"},H={__name:"Login",props:{canResetPassword:Boolean,status:String},setup(l){const e=v({email:"",password:"",remember:!1}),n=()=>{e.post(route("login"),{onFinish:()=>e.reset("password")})};return(i,a)=>(d(),c(U,null,{default:m(()=>[t(s(V),{title:"Log in"}),l.status?(d(),y("div",R,$(l.status),1)):f("",!0),r("form",{onSubmit:N(n,["prevent"])},[r("div",null,[t(g,{for:"email",value:"Email"}),t(k,{id:"email",type:"email",class:"mt-1 block w-full",modelValue:s(e).email,"onUpdate:modelValue":a[0]||(a[0]=o=>s(e).email=o),required:"",autofocus:"",autocomplete:"username"},null,8,["modelValue"]),t(_,{class:"mt-2",message:s(e).errors.email},null,8,["message"])]),r("div",S,[t(g,{for:"password",value:"Password"}),t(k,{id:"password",type:"password",class:"mt-1 block w-full",modelValue:s(e).password,"onUpdate:modelValue":a[1]||(a[1]=o=>s(e).password=o),required:"",autocomplete:"current-password"},null,8,["modelValue"]),t(_,{class:"mt-2",message:s(e).errors.password},null,8,["message"])]),r("div",D,[r("label",E,[t(P,{name:"remember",checked:s(e).remember,"onUpdate:checked":a[2]||(a[2]=o=>s(e).remember=o)},null,8,["checked"]),F])]),r("div",M,[l.canResetPassword?(d(),c(s(B),{key:0,href:i.route("password.request"),class:"underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"},{default:m(()=>[p(" Forgot your password? ")]),_:1},8,["href"])):f("",!0),t(q,{class:C(["ml-4",{"opacity-25":s(e).processing}]),disabled:s(e).processing},{default:m(()=>[p(" Log in ")]),_:1},8,["class","disabled"])])],32)]),_:1}))}};export{H as default};
