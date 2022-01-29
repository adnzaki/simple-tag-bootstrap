<?php

// You can choose to write your HTML in SimpleTag or separate file
$content1 = file_get_contents(basePath('custom-slots/list.php'));

$content2 = 'This is the second item\'s accordion body.';

// create custom accordion ID (optional)
// skip this step if you want to use default ID
$accordion = accordion()->id('accordionSample');

// generate accordion open tag
$accordion->open();

// accordion item
$accordion->item('headingOne', 'collapseOne', 'Button 1', $content1, true);
$accordion->item('headingTwo', 'collapseTwo', 'Button 2', $content2, false, 'p');
$accordion->item('headingThree', 'collapseThree', 'Button 3', 'Hello World!', false, 'h4 > strong');

// close accordion tag
close_tag();

// Above codes will produce the following HTML:
// --------------------------------------------------------------------------------------------
// <div class="accordion" id="accordionSample">
//   <div class="accordion-item">
//     <h2 class="accordion-header" id="headingOne">
//       <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
//         Button 1
//       </button>
//     </h2>
//     <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
//       data-bs-parent="#accordionSample">
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
//       data-bs-parent="#accordionSample">
//       <div class="accordion-body">
//         <p>This is the second item's accordion body.</p>
//       </div>
//     </div>
//   </div>
//   <div class="accordion-item">
//     <h2 class="accordion-header" id="headingThree">
//       <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
//         Button 3
//       </button>
//     </h2>
//     <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
//       data-bs-parent="#accordionSample">
//       <div class="accordion-body">
//         <h4><strong>Hello World!</strong></h4>
//       </div>
//     </div>
//   </div>
// </div>