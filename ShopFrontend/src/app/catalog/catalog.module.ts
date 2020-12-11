import { NgModule } from "@angular/core";
import { CommonModule } from "@angular/common";
import { CatalogComponent } from "./catalog.component";
import { DetailComponent } from "./detail/detail.component";
import { RouterModule, Routes } from "@angular/router";
import { CatalogRoutingModule } from "./catalog-routing.module";
import { FormsModule } from "@angular/forms";

@NgModule({
  imports: [CommonModule, FormsModule, CatalogRoutingModule],
  declarations: [CatalogComponent, DetailComponent]
})
export class CatalogModule {}
