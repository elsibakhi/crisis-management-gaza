// let select1 = document.querySelector("#kt_dual_listbox_roles");
// window.dualListbox1 = new DualListbox(select1); // Add a HTMLElement

// let select2 = document.querySelector("#kt_dual_listbox_permissions");
// window.dualListbox2 = new DualListbox(select2); // Add a HTMLElement


// // استدعاء العنصرين من DOM
let select1 = document.querySelector("#kt_dual_listbox_roles");
let select2 = document.querySelector("#kt_dual_listbox_permissions");

var options ={};
if(language=="ar"){

    options= {    
         availableTitle: "العناصر المتاحة",
        selectedTitle: "العناصر المختارة",
        addButtonText: "إضافة",
        removeButtonText: "إزالة",
        addAllButtonText: "إضافة الكل",
        removeAllButtonText: "إزالة الكل",
        searchPlaceholder: "بحث" 
    };
}
// إنشاء القائمتين وترجمة النصوص الافتراضية
window.dualListbox1 = new DualListbox(select1,options );

window.dualListbox2 = new DualListbox(select2, options);
