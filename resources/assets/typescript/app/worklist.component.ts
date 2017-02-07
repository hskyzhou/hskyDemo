import { Component } from '@angular/core';

import { Work } from './work';

@Component({
	moduleId : module.id,
	selector: 'my-work',
	templateUrl : "worklist.component.html"
})

export class WorklistComponent{
	worklist : Work[] = [
		{
			name : 'hsky'
		}
	];


	addWork() : void{
		let workinfo : Work = {
			name : ""
		};
		this.worklist.push(workinfo);
	}
} 