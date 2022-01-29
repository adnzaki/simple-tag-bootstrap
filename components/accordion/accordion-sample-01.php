<?php

// You can choose to write your HTML in SimpleTag or separate file
$content1 = file_get_contents(basePath('custom-slots/list.php'));

$content2 = 'This is the second item\'s accordion body.';

// generate accordion open tag
accordion_open();

// accordion item
accordion('headingOne', 'collapseOne', 'Button 1', $content1, true, 'div');
accordion('headingTwo', 'collapseTwo', 'Button 2', $content2);

// close tag
close_tag();

// Above codes will produce the following HTML:
// --------------------------------------------------------------------------------------------
// <div class="accordion" id="my-accordion">
//   <div class="accordion-item">
//     <h2 class="accordion-header" id="headingOne">
//       <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
//         Button 1
//       </button>
//     </h2>
//     <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
//       data-bs-parent="#my-accordion">
//       <div class="accordion-body">
//         <div>
//           <ul>
//             <li>Menu 1</li>
//             <li>Menu 2</li>
//           </ul>
//         </div>
//       </div>
//     </div>
//   </div>
//   <div class="accordion-item">
//     <h2 class="accordion-header" id="headingTwo">
//       <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
//         Button 2
//       </button>
//     </h2>
//     <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
//       data-bs-parent="#my-accordion">
//       <div class="accordion-body">
//         <p>This is the second item's accordion body.</p>
//       </div>
//     </div>
//   </div>
// </div>