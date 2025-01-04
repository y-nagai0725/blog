(()=>{var e={184:(e,t)=>{var a;!function(){"use strict";var l={}.hasOwnProperty;function n(){for(var e=[],t=0;t<arguments.length;t++){var a=arguments[t];if(a){var o=typeof a;if("string"===o||"number"===o)e.push(a);else if(Array.isArray(a)){if(a.length){var r=n.apply(null,a);r&&e.push(r)}}else if("object"===o){if(a.toString!==Object.prototype.toString&&!a.toString.toString().includes("[native code]")){e.push(a.toString());continue}for(var c in a)l.call(a,c)&&a[c]&&e.push(c)}}}return e.join(" ")}e.exports?(n.default=n,e.exports=n):void 0===(a=function(){return n}.apply(t,[]))||(e.exports=a)}()}},t={};function a(l){var n=t[l];if(void 0!==n)return n.exports;var o=t[l]={exports:{}};return e[l](o,o.exports,a),o.exports}a.n=e=>{var t=e&&e.__esModule?()=>e.default:()=>e;return a.d(t,{a:t}),t},a.d=(e,t)=>{for(var l in t)a.o(t,l)&&!a.o(e,l)&&Object.defineProperty(e,l,{enumerable:!0,get:t[l]})},a.o=(e,t)=>Object.prototype.hasOwnProperty.call(e,t),(()=>{"use strict";const e=window.wp.blocks,t=window.React,l=window.wp.i18n,n=window.wp.blockEditor,o=window.wp.components,r=window.wp.element;var c=a(184),s=a.n(c);const i=window.hcbVars?.showLang,u=window.hcbVars?.showLinenum;let d=window?.hcbLangs||null;const p=[["plain","Plain"],...Object.entries(d)],m=[{value:"",label:"Plain"},...Object.entries(d).map((([e,t])=>({value:e,label:t})))],g=(e="")=>{const t=e.match(/\r\n|\n/g);return null!==t?t.length+1:1};function h(e){return e?e.replace(/</g,"&lt;").replace(/>/g,"&gt;").replace(/"/g,"&quot;").replace(/'/g,"&#39;"):e}const b=JSON.parse('{"u2":"loos-hcb/code-block"}'),f=(0,t.createElement)("svg",{x:"0px",y:"0px",viewBox:"0 0 512 512"},(0,t.createElement)("g",null,(0,t.createElement)("path",{d:"M54.4,348.2H89v51h31.2v-51h34.6V484h-34.6v-54.6H89v54.5H54.4V348.2z"}),(0,t.createElement)("path",{d:"M267.5,345.7c17.5,0,31.6,8.3,41,17.3l-19,21.6c-6.2-5.6-12.8-9.2-22-9.2c-17.3,0-30.5,15.2-30.5,40.4 c0,26.1,13.2,40.6,32,40.6c9,0,16.4-4.5,22.4-11.1l19,21.1c-11.5,13.4-26.7,19.9-43.4,19.9c-35.3,0-65.4-23.1-65.4-69.4 C201.6,371.7,230.9,345.7,267.5,345.7z"}),(0,t.createElement)("path",{d:"M356.5,348.2h44.4c28.2,0,50.6,7.1,50.6,33.7c0,11.8-7.1,25.4-22.9,29.5v0.8c19.2,3.6,29,13.7,29,31.8 c0,28-23.1,40-52.6,40h-48.5V348.2z M399.8,402c12.6,0,17.7-6,17.7-14.9c0-8.6-5.3-12.2-17.7-12.2h-8.5V402H399.8z M402.3,457.2 c14.7,0,21.1-5.5,21.1-16.2c0-10.5-6.4-14.9-21.1-14.9h-11.1v31h11.1V457.2z"})),(0,t.createElement)("polygon",{points:"172,311.6 195,288.6 76.2,165.7 195,42.9 172,19.8 30.1,165.7 "}),(0,t.createElement)("polygon",{points:"340,19.8 317,42.9 435.8,165.7 317,288.6 340,311.6 481.9,165.7 "})),y=[{supports:{className:!1},attributes:{code:{type:"string",source:"text",selector:"code"},className:{type:"string",default:""},langType:{type:"string",default:""},langName:{type:"string",default:""},fileName:{type:"string",default:""},dataLineNum:{type:"string",default:""},isLineShow:{type:"string",default:"undefined"},isShowLang:{type:"string",default:""}},save:({attributes:e})=>{const{code:a,fileName:l,langName:o,dataLineNum:r,isLineShow:c,isShowLang:i}=e,u=e.langType||"plain";let d=s()("prism",`lang-${u}`);return"undefined"!==c&&(d=s()(d,`${c}-numbers`)),(0,t.createElement)("div",{className:"hcb_wrap"},(0,t.createElement)("pre",{className:d,"data-file":l||null,"data-lang":o||null,"data-line":r||null,"data-show-lang":i||null},(0,t.createElement)(n.RichText.Content,{tagName:"code",value:h(a)})))}},{supports:{className:!1},attributes:{code:{type:"string",source:"text",selector:"code"},className:{type:"string",default:""},langType:{type:"string",default:"plane"},langName:{type:"string",default:""},fileName:{type:"string",default:""},dataLineNum:{type:"string",default:""},isLineShow:{type:"string",default:"undefined"},isShowLang:{type:"string",default:""}},migrate:e=>("plane"===e.langType&&(e.langType=""),e),save:({attributes:e})=>{const{code:a,langType:l,fileName:o,langName:r,dataLineNum:c,isLineShow:s,isShowLang:i}=e,u="prism "+s+"-numbers lang-"+l;return(0,t.createElement)("div",{className:"hcb_wrap"},(0,t.createElement)("pre",{className:u,"data-file":o||null,"data-lang":r||null,"data-line":c||null,"data-show-lang":i||null},(0,t.createElement)(n.RichText.Content,{tagName:"code",value:h(a)})))}}];(0,e.registerBlockType)(b.u2,{icon:f,transforms:{from:[{type:"block",blocks:["core/code"],transform:t=>(0,e.createBlock)("loos-hcb/code-block",{code:t.content})}],to:[{type:"block",blocks:["core/code"],transform:t=>(0,e.createBlock)("core/code",{content:t.code})}]},edit:({attributes:e,setAttributes:a,clientId:c})=>{const h=(0,r.useRef)(),{className:b,code:f="",langType:y,fileName:v,langName:w,dataLineNum:N,dataStart:E,isShowLang:_,isLineShow:S}=e,[L,x]=(0,r.useState)(g(f)),C=s()("hcb-block","hcb_wrap");(0,r.useEffect)((()=>{const e=b||"";if(!e)return;const t=e.split(" "),l=[...new Set(t)];a({className:s()(l)})}),[b,a]),(0,r.useEffect)((()=>{const{ownerDocument:e}=h.current;if(e){const t=e.querySelector(`#block-${c}`),a=t.querySelector(".hcb_textarea");if(t.style.setProperty("--hcb--code-linenum",L),a.scrollWidth>a.offsetWidth){const e=a.offsetHeight-a.clientHeight;t.style.setProperty("--hcb--scbarH",e+"px")}}}),[c,L]);let T="0";("1"===_||""===_&&"on"===i)&&(T="1");let k=null;("on"===S||"undefined"===S&&"on"===u)&&(k="1");const P=(0,n.useBlockProps)({ref:h,className:C,"data-file":v||null,"data-lang":w||null,"data-show-lang":T,"data-show-linenum":k}),B=[...p];return y||B.shift(),(0,t.createElement)(t.Fragment,null,(0,t.createElement)(n.BlockControls,null,(0,t.createElement)(o.ToolbarGroup,{isCollapsed:!0,icon:(0,t.createElement)(t.Fragment,null,w||(0,l.__)("Language","loos-hcb")),title:"Lnaguage",controls:B.map((([e,t])=>({key:e,isActive:e===y,title:t,onClick:()=>{a("plain"===e?{langType:"",langName:""}:{langType:e,langName:t})}})))})),(0,t.createElement)(n.InspectorControls,null,(0,t.createElement)(o.PanelBody,{title:(0,l.__)("HCB settings","loos-hcb"),initialOpen:!0},(0,t.createElement)(o.SelectControl,{label:(0,l.__)("Language","loos-hcb"),value:e.langType,options:m,onChange:e=>{a(""===e?{langType:"",langName:""}:{langType:e,langName:d[e]})}}),(0,t.createElement)(o.SelectControl,{label:(0,l.__)("Display line numbers","loos-hcb"),value:S,options:[{label:(0,l.__)("Do not set individually","loos-hcb"),value:"undefined"},{label:(0,l.__)("Display row count","loos-hcb"),value:"on"},{label:(0,l.__)("Do not display row count","loos-hcb"),value:"off"}],onChange:e=>{a({isLineShow:e})}}),(0,t.createElement)(o.SelectControl,{label:(0,l.__)("Display language name","loos-hcb"),value:_,options:[{label:(0,l.__)("Do not set individually","loos-hcb"),value:""},{label:(0,l.__)("Display language","loos-hcb"),value:"1"},{label:(0,l.__)("Do not display language","loos-hcb"),value:"0"}],onChange:e=>{a({isShowLang:e})}}),(0,t.createElement)(o.TextControl,{label:(0,l.__)("File name","loos-hcb"),value:v,onChange:e=>{a({fileName:e})}}),(0,t.createElement)(o.TextControl,{label:(0,t.createElement)(t.Fragment,null,(0,l.__)("Highlight Number","loos-hcb")+" ( ",(0,t.createElement)("code",{className:"hcb-code-in-label"},"[data-line]")," )"),value:N,onChange:e=>{a({dataLineNum:e})}}),(0,t.createElement)(o.TextControl,{type:"number",label:(0,t.createElement)(t.Fragment,null,(0,l.__)("First line number","loos-hcb")+" ( ",(0,t.createElement)("code",{className:"hcb-code-in-label"},"[data-start]")," )"),value:E||1,onChange:e=>{a({dataStart:parseInt(e||1)})},style:{opacity:k?1:.5},disabled:!k}))),(0,t.createElement)("div",{...P},(0,t.createElement)("div",{className:"hcb_codewrap"},k&&(0,t.createElement)("div",{className:"hcb_linenum"},(0,t.createElement)("div",{className:"hcb-startNum"},E)),(0,t.createElement)("textarea",{className:"hcb_textarea",placeholder:"Your Code...",value:f,onChange:e=>{const t=e.target.value;a({code:t});const l=g(t);L!==l&&x(l)}}),N&&(0,t.createElement)("div",{className:"hcb-datapreview"},(0,t.createElement)("div",{className:"hcb-datapreview__items"},`{${N}}`)))))},save:({attributes:e})=>{const{code:a,fileName:l,langName:o,dataLineNum:r,dataStart:c,isLineShow:i,isShowLang:u}=e,d=e.langType||"plain",p=s()("prism",`${i}-numbers`,`lang-${d}`),m=n.useBlockProps.save({className:"hcb_wrap"});return(0,t.createElement)("div",{...m},(0,t.createElement)("pre",{className:p,"data-file":l||null,"data-lang":o||null,"data-line":r||null,"data-start":1===c?null:c,"data-show-lang":u||null},(0,t.createElement)(n.RichText.Content,{tagName:"code",value:h(a)})))},deprecated:y})})()})();