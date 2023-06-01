import{p as P}from"./popup.b60b699f.js";import{W as A}from"./WpTable.6ebd2781.js";import"./default-i18n.ab92175e.js";import"./constants.449145d5.js";import{_ as S,c as p,d as s,w as o,r as i,o as a,a as r,y as l,t as d,f as h,F as W,G as E,b as y}from"./_plugin-vue_export-helper.1252226d.js";import"./index.fef507ce.js";import"./SaveChanges.03404395.js";import{m as f,a as g,c as H}from"./vuex.esm-bundler.2e787911.js";import{C as M}from"./index.c8bcf9e5.js";import{G as O,a as B}from"./Row.3c6833bf.js";import{S as N}from"./Checkmark.b071baa5.js";import{W as U,a as V,b as G}from"./Header.18bd68ff.js";import{W as F,a as I}from"./Steps.1fb47f4a.js";import"./params.597cd0f5.js";import"./Index.25975920.js";import"./Caret.21cdd163.js";import"./helpers.de7566d0.js";import"./RequiresUpdate.52f5acf2.js";import"./postContent.d5640333.js";import"./cleanForSlug.3cf2e377.js";import"./isArrayLikeObject.da221b94.js";import"./html.14f2a8b9.js";import"./Index.67d5329e.js";import"./_commonjsHelpers.f84db168.js";import"./Logo.ca2c08a1.js";const D={components:{CoreAlert:M,GridColumn:O,GridRow:B,SvgCheckmark:N,WizardBody:U,WizardCloseAndExit:F,WizardContainer:V,WizardHeader:G,WizardSteps:I},mixins:[A],data(){return{error:null,loading:!1,stage:"license-key",localLicenseKey:null,strings:{enterYourLicenseKey:this.$t.sprintf(this.$t.__("Enter your %1$s License Key",this.$td),"AIOSEO"),boldText:this.$t.sprintf("<strong>%1$s %2$s</strong>","AIOSEO","Lite"),purchasedBoldText:this.$t.sprintf("<strong>%1$s %2$s</strong>","AIOSEO","Pro"),linkText:this.$t.sprintf(this.$t.__("upgrade to %1$s",this.$td),"Pro"),placeholder:this.$t.__("Paste your license key here",this.$td),connect:this.$t.__("Connect",this.$td)}}},watch:{localLicenseKey(e){this.updateLicenseKey(e)}},computed:{...f(["options"]),...f("wizard",{stateLicenseKey:"licenseKey",presetFeatures:"features"}),noLicenseNeeded(){return this.$t.sprintf(this.$t.__("You're using %1$s - no license needed. Enjoy!",this.$td)+" 🙂",this.strings.boldText)},link(){return this.$t.sprintf('<strong><a href="%1$s" target="_blank">%2$s</a></strong>',this.$links.utmUrl("general-settings","license-box"),this.strings.linkText)},tooltipText(){return this.$isPro?this.$t.__("To unlock the selected features, please enter your license key below.",this.$td):this.$t.sprintf(this.$t.__("To unlock the selected features, please %1$s and enter your license key below.",this.$td),this.link)},alreadyPurchased(){return this.$t.sprintf(this.$t.__("Already purchased? Simply enter your license key below to connect with %1$s!",this.$td),this.strings.purchasedBoldText)}},methods:{...g(["getConnectUrl","processConnect","activate"]),...g("wizard",["saveWizard"]),...H("wizard",["updateLicenseKey"]),processConnectOrActivate(){if(this.$isPro)return this.processActivateLicense();this.processGetConnectUrl()},processActivateLicense(){this.error=null,this.loading=!0,this.$store.commit("loading",!0),this.activate(this.localLicenseKey).then(()=>{this.$aioseo.internalOptions.internal.license.expired=!1,this.saveWizard("license-key").then(()=>{this.$router.push(this.getNextLink)})}).catch(e=>{if(this.loading=!1,this.localLicenseKey=null,this.$store.commit("loading",!1),!e||!e.response||!e.response.body||!e.response.body.error||!e.response.body.licenseData){this.error=this.$t.__("An unknown error occurred, please try again later.",this.$td);return}const n=e.response.body.licenseData;n.invalid?this.error=this.$t.__("The license key provided is invalid. Please use a different key to continue receiving automatic updates.",this.$td):n.disabled?this.error=this.$t.__("The license key provided is disabled. Please use a different key to continue receiving automatic updates.",this.$td):n.expired?this.error=this.licenseKeyExpired:n.activationsError?this.error=this.$t.__("This license key has reached the maximum number of activations. Please deactivate it from another site or purchase a new license to continue receiving automatic updates.",this.$td):(n.connectionError||n.requestError)&&(this.error=this.$t.__("There was an error connecting to the licensing API. Please try again later.",this.$td))})},processGetConnectUrl(){this.loading=!0,this.$store.commit("loading",!0),this.getConnectUrl({key:this.localLicenseKey,wizard:!0}).then(e=>{if(e.body.url){if(!e.body.popup)return this.loading=!1,this.$store.commit("loading",!1),window.open(e.body.url);this.openPopup(e.body.url)}})},openPopup(e){P(e,"_self",600,630,!0,["file","token"],this.completedCallback,this.closedCallback)},completedCallback(e){return e.wizard=!0,this.processConnect(e)},closedCallback(e){if(e)return window.location.reload();this.loading=!1,this.$store.commit("loading",!1)},skipStep(){this.saveWizard(),this.$router.push(this.getNextLink)}},mounted(){this.localLicenseKey=this.stateLicenseKey}},Y={class:"aioseo-wizard-license-key"},R={class:"header"},j=["innerHTML"],q={class:"license-cta-box"},J=["innerHTML"],Q=["innerHTML"],X={class:"license-key"},Z=r("input",{type:"text",name:"username",autocomplete:"username",style:{display:"none"}},null,-1),ee={class:"go-back"},te=r("div",{class:"spacer"},null,-1);function se(e,n,ie,ne,t,c){const k=i("wizard-header"),$=i("wizard-steps"),L=i("svg-checkmark"),b=i("grid-column"),w=i("grid-row"),v=i("base-input"),_=i("base-button"),C=i("core-alert"),m=i("router-link"),x=i("wizard-body"),z=i("wizard-close-and-exit"),T=i("wizard-container");return a(),p("div",Y,[s(k),s(T,null,{default:o(()=>[s(x,null,{footer:o(()=>[r("div",ee,[s(m,{to:e.getPrevLink,class:"no-underline"},{default:o(()=>[l("←")]),_:1},8,["to"]),l("   "),s(m,{to:e.getPrevLink},{default:o(()=>[l(d(t.strings.goBack),1)]),_:1},8,["to"])]),te,s(_,{type:"gray",onClick:c.skipStep},{default:o(()=>[l(d(t.strings.skipThisStep),1)]),_:1},8,["onClick"])]),default:o(()=>[s($),r("div",R,d(t.strings.enterYourLicenseKey),1),e.$isPro?h("",!0):(a(),p("div",{key:0,class:"description",innerHTML:c.noLicenseNeeded},null,8,j)),r("div",q,[r("div",{innerHTML:c.tooltipText},null,8,J),s(w,null,{default:o(()=>[(a(!0),p(W,null,E(e.getSelectedUpsellFeatures,(u,K)=>(a(),y(b,{sm:"6",key:K},{default:o(()=>[s(L),l(" "+d(u.name),1)]),_:2},1024))),128))]),_:1})]),e.$isPro?h("",!0):(a(),p("div",{key:1,innerHTML:c.alreadyPurchased},null,8,Q)),r("form",X,[Z,s(v,{type:"password",placeholder:t.strings.placeholder,"append-icon":t.localLicenseKey?"circle-check":null,autocomplete:"new-password",modelValue:t.localLicenseKey,"onUpdate:modelValue":n[0]||(n[0]=u=>t.localLicenseKey=u)},null,8,["placeholder","append-icon","modelValue"]),s(_,{type:"green",disabled:!t.localLicenseKey,loading:t.loading,onClick:c.processConnectOrActivate},{default:o(()=>[l(d(t.strings.connect),1)]),_:1},8,["disabled","loading","onClick"])]),t.error?(a(),y(C,{key:2,class:"license-key-error",type:"red",innerHTML:t.error},null,8,["innerHTML"])):h("",!0)]),_:1}),s(z)]),_:1})])}const Pe=S(D,[["render",se]]);export{Pe as default};
