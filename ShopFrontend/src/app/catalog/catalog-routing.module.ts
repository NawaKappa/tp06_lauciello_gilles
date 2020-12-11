import { NgModule } from "@angular/core";
import { Routes, RouterModule } from "@angular/router";
import { CatalogComponent } from "./catalog.component";
import { DetailComponent } from "./detail/detail.component";

const routes: Routes = [
  {
    path: "detail/:id",
    component: DetailComponent
  },
  {
    path: "",
    component: CatalogComponent
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],

  exports: [RouterModule]
})
export class CatalogRoutingModule {}

/*
Copyright 2017-2018 Google Inc. All Rights Reserved.
Use of this source code is governed by an MIT-style license that
can be found in the LICENSE file at http://angular.io/license
*/
