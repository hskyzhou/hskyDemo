import { Component } from '@angular/core';

import { Work } from './work';

@Component({
	moduleId : module.id,
	selector: 'my-add-work',
	templateUrl : "addwork.component.html"
})

export class AddWorkComponent{
	workname = "";
	worklist : Work[] = [
		{
			name : 'hsky'
		}
	];


	addWork() : void{
		let workinfo : Work = {
			name : this.workname
		};
		this.worklist.push(workinfo);
		this.workname = "";
	}
} 