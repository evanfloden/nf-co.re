---
title: Graphic design guidelines
subtitle: Templates, common images, and design-related content for nf-core.
---

## Introduction

nf-core has a variety of recognisable images and other graphic designs for the community project.
To help facilitate the identification of nf-core pipelines and related material, we provide here a variety of files that can be used for all nf-core-related content, such as pipeline logos, presentations, or workflow diagrams.

All files are released under various forms of 'open' licenses, meaning you can re-use and re-model as you see fit.

## Logo

All information for the nf-core logo can be seen at the [nf-core/logos GitHub repository](https://github.com/nf-core/logos) and are released under the MIT licence.

| Type | Logo | Links |
|----|----|----|
| Main nf-core logo | <img src="https://raw.githubusercontent.com/nf-core/logos/master/nf-core-logos/nf-core-logo.png" width="300"> | [PNG](https://github.com/nf-core/logos/blob/master/nf-core-logos/nf-core-logo.png) <br> [SVG](https://github.com/nf-core/logos/blob/master/nf-core-logos/nf-core-logo.svg) <br> [Adobe Illustrator `.ai`](https://github.com/nf-core/logos/blob/master/nf-core-logos/nf-core-logo.ai) |
| Dark backgrounds | <img class="bg-dark d-block p-2" src="https://raw.githubusercontent.com/nf-core/logos/master/nf-core-logos/nf-core-logo-darkbg.png" width="300"> | [PNG](https://github.com/nf-core/logos/blob/master/nf-core-logos/nf-core-logo-darkbg.png) <br> [SVG](https://github.com/nf-core/logos/blob/master/nf-core-logos/nf-core-logo-darkbg.svg) <br> [Adobe Illustrator `.ai`](https://github.com/nf-core/logos/blob/master/nf-core-logos/nf-core-logo-darkbg.ai) |
| Monochrome - dark background | <img class="bg-dark d-block p-2" src="https://raw.githubusercontent.com/nf-core/logos/master/nf-core-logos/nf-core-logo-mono-white.png" width="300"> | [PNG](https://github.com/nf-core/logos/blob/master/nf-core-logos/nf-core-logo-mono-white.png) <br> [SVG](https://github.com/nf-core/logos/blob/master/nf-core-logos/nf-core-logo-mono-white.svg) <br> [Adobe Illustrator `.ai`](https://github.com/nf-core/logos/blob/master/nf-core-logos/nf-core-logo-mono-white.ai) |
| Square | <img src="https://raw.githubusercontent.com/nf-core/logos/master/nf-core-logos/nf-core-logo-square.png" width="60"> | [PNG](https://github.com/nf-core/logos/blob/master/nf-core-logos/nf-core-logo-square.png) <br> [SVG](https://github.com/nf-core/logos/blob/master/nf-core-logos/nf-core-logo-square.svg) <br> [Adobe Illustrator `.ai`](https://github.com/nf-core/logos/blob/master/nf-core-logos/nf-core-logo-square.ai) |

The `nf-core create` command will generate a logo for your pipeline automatically.
However, you can also do this yourself by visiting [https://nf-co.re/logo/pipelinename](https://nf-co.re/logo/pipelinename), where `pipelinename` can be anything.

Please note that nf-core is a separate entity from Nextflow.
You can find information about the Nextflow trademark with associated logo files at [https://github.com/nextflow-io/trademark](https://github.com/nextflow-io/trademark)

## Font & Colours

The font used in nf-core designs is _Maven Pro Bold (700)_, available at [Google Fonts](https://fonts.google.com/specimen/Maven+Pro), under the Open Font License.

The nf-core green colour is as follows:

* RGB: <span class="badge badge-info" style="background-color: rgb(36,176,100);">36,176,100</span>
* Hex: <span class="badge badge-info" style="background-color: rgb(36,176,100);">#24B064</span>

## Presentation Templates

nf-core regularly host [community events](https://nf-co.re/events), such as hackathons, and encourage training (e.g. [nf-core tutorials](https://nf-co.re/usage/nf_core_tutorial)) the wider bioinformatics community in creating nextflow and nf-core pipelines.

<!--
If you wish to introduce or run training sessions to your group or network, you can access a Google Doc template **here**.
-->

## Workflow Schematics

It is often useful to have simplified diagrams that outline the main functionality and steps of a pipeline.
This helps new users get an overview of a workflow when visiting a pipeline webpage or repository for the first time.

Most workflow diagrams are made by hand using vector image editors such as the open-source [Inkscape](https://inkscape.org/) or commercial suites such as [Adobe Illustrator](https://www.adobe.com/products/illustrator.html). Useful tools for collaborative prototyping include [Google Drawings](https://docs.google.com/drawings/) or [LucidChart](www.lucidchart.com). All examples and components below can be opened in these editors, and various parts borrowed and/or modified as necessary.

### Examples

See below for some examples of nf-core workflow schematics that can be re-used and modified for your own pipeline.

Click the schematic image to see the original.

| Workflow Example   | nf-core Pipeline | License/Publication |
|:------------------:|------------------|---------|
| <a href="https://github.com/nf-core/sarek/blob/master/docs/images/sarek_workflow.png"><img src="https://raw.githubusercontent.com/nf-core/sarek/master/docs/images/sarek_workflow.png" alt="nf-core/sarek workflow" height="300"></a> | [nf-core/sarek](https://nf-co.re/sarek) | From [Garcia _et al._ (2020, F1000 Research)](https://doi.org/10.12688/f1000research.16665.1) under a [CC-BY 4.0](https://creativecommons.org/licenses/by/4.0/) license. |
| <a href="https://github.com/nf-core/eager/blob/master/docs/images/output/overview/eager2_workflow.png"><img src="https://raw.githubusercontent.com/nf-core/eager/master/docs/images/usage/eager2_workflow.png" alt="nf-core/eager workflow simple" width="400"></a> | [nf-core/eager](https://nf-co.re/eager) | From [Fellows Yates _et al._ (2020, bioRxiv)](https://doi.org/10.1101/2020.06.11.145615) under a [CC-BY 4.0](https://creativecommons.org/licenses/by/4.0/) license |
| <a href="https://github.com/nf-core/eager/raw/master/docs/images/usage/eager2_metromap_complex.png"><img src="https://github.com/nf-core/eager/raw/master/docs/images/usage/eager2_metromap_complex.png" alt="nf-core/eager workflow detailed" width="400"></a> | [nf-core/eager](https://nf-co.re/eager) |  From [Fellows Yates _et al._ (2021, PeerJ)](https://doi.org/10.7717/peerj.10947) under a [CC-BY 4.0](https://creativecommons.org/licenses/by/4.0/) license |
| <a href="https://github.com/nf-core/dualrnaseq/raw/master/docs/images/Workflow_diagram_dualrnaseq.png"><img src="https://github.com/nf-core/dualrnaseq/raw/master/docs/images/Workflow_diagram_dualrnaseq.png" alt="nf-core/dualrnaseq workflow" width="400"></a> | [nf-core/dualrnaseq](https://nf-co.re/dualrnaseq) | By Regan Hayward under [MIT](https://github.com/nf-core/dualrnaseq/blob/master/LICENSE) license |
| <a href="https://github.com/nf-core/circrna/raw/master/docs/images/workflow.png"><img src="https://github.com/nf-core/circrna/raw/master/docs/images/workflow.png" alt="nf-core/circrna workflow" width="400"></a> | [nf-core/circrna](https://nf-co.re/circrna) | By Barry Digby under [MIT](https://github.com/nf-core/circrna/blob/master/LICENSE) license |
| <a href="https://raw.githubusercontent.com/nf-core/mag/master/docs/images/mag_workflow.png"><img src="https://raw.githubusercontent.com/nf-core/mag/master/docs/images/mag_workflow.png" alt="nf-core/mag workflow" width="400"></a> | [nf-core/mag](https://nf-co.re/mag) | By Sabrina Krakau under [MIT](https://github.com/nf-core/mag/blob/master/LICENSE) license |
| <a href="https://github.com/nf-core/bactmap/raw/master/docs/images/Bactmap_pipeline.png"><img src="https://github.com/nf-core/bactmap/raw/master/docs/images/Bactmap_pipeline.png" alt="nf-core/bactmap workflow" width="400"></a> | [nf-core/bactmap](https://nf-co.re/bactmap) | By Anthony Underwood under [MIT](https://github.com/nf-core/mag/blob/master/LICENSE) license |


### Components

Some components that may be useful are shown below:

| Object | Description | Link | Source |
|:------:|-------------|------|----------|
| <img title="Single FASTQ Icon" src="/assets/graphic_design_assets/workflow_schematics_components/sarek/single_fastq.png" height="50">   | Single FASTQ File Icon | [SVG](/assets/graphic_design_assets/workflow_schematics_components/sarek/single_fastq.svg) <br> [PNG](/assets/graphic_design_assets/workflow_schematics_components/sarek/single_fastq.png) | [nf-core/sarek](https://nf-co.re/sarek); under a [CC-BY 4.0](https://creativecommons.org/licenses/by/4.0/) license. |
| <img title="Double FASTQ Icon" src="/assets/graphic_design_assets/workflow_schematics_components/sarek/double_fastq.png" height="50">   | Multiple FASTQ File Icon | [SVG](/assets/graphic_design_assets/workflow_schematics_components/sarek/double_fastq.svg) <br> [PNG](/assets/graphic_design_assets/workflow_schematics_components/sarek/double_fastq.png) | [nf-core/sarek](https://nf-co.re/sarek); under a [CC-BY 4.0](https://creativecommons.org/licenses/by/4.0/) license. |
| <img title="Single BAM Icon" src="/assets/graphic_design_assets/workflow_schematics_components/sarek/single_bam.png" height="50">       | Single BAM File Icon   | [SVG](/assets/graphic_design_assets/workflow_schematics_components/sarek/single_bam.svg)   <br> [PNG](/assets/graphic_design_assets/workflow_schematics_components/sarek/single_bam.png)   | [nf-core/sarek](https://nf-co.re/sarek); under a [CC-BY 4.0](https://creativecommons.org/licenses/by/4.0/) license. |]
| <img title="Double BAM Icon" src="/assets/graphic_design_assets/workflow_schematics_components/sarek/double_bam.png" height="50">       | Multiple BAM File Icon   | [SVG](/assets/graphic_design_assets/workflow_schematics_components/sarek/double_bam.svg)   <br> [PNG](/assets/graphic_design_assets/workflow_schematics_components/sarek/double_bam.png)   | [nf-core/sarek](https://nf-co.re/sarek); under a [CC-BY 4.0](https://creativecommons.org/licenses/by/4.0/) license. |]
| <img title="Multiple VCF Icon" src="/assets/graphic_design_assets/workflow_schematics_components/sarek/multiple_vcf.png" height="50">   | Multiple VCF File Icon | [SVG](/assets/graphic_design_assets/workflow_schematics_components/sarek/multiple_vcf.svg) <br> [PNG](/assets/graphic_design_assets/workflow_schematics_components/sarek/multiple_vcf.png) | [nf-core/sarek](https://nf-co.re/sarek); under a [CC-BY 4.0](https://creativecommons.org/licenses/by/4.0/) license. |
