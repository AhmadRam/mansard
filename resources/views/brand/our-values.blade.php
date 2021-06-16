@extends('layouts.app')
@section('content')
<title>{{__('Our Values')}}</title>

<article class="item">
	<div class="content clearfix">
		<p style="text-align: justify;"><img class="inset-right" src="../../images/deco-site/MIF.jpg" alt="MIF" width="200" height="190" /></p>
		<table>
			<tbody>
				<tr>
					<td>
						<p>{{__('For over 40 years, the Laboratoires Mansard are engaged in manufacturing honest and respectful cosmetic products based on the inherited family values.')}}</p>
					</td>
				</tr>
			</tbody>
		</table>
		<p style="text-align: justify;">&nbsp;<span lang="EN-US">{{__('Our philosophy has always been to propose high quality products respecting 3 fundamental principles')}}:</span></p>
		<ul>
			<li><span lang="EN-US">{{__('Avoid the ingredients that are dangerous for the human and for the planet')}}</span></li>
			<li><span lang="EN-US">{{__('Promote French companies and their know-how')}}</span></li>
			<li><span lang="EN-US">{{__('Stimulate research and development of our cosmetics to guarantee their efficiency and safety for the most sensitive skin')}}</span></li>
		</ul>
		<p><span style="text-decoration: underline;">{{__('Respect of those values ​​allows us to obtain exceptional, ethical and committed products.')}}</span></p>
		<p>&nbsp;</p>
		<p class="font_color"><strong>{{__('Today, a product from the Laboratories Mansard is first of all')}}:</strong></p>
		<ul>
			<li><span lang="EN">{{__('A guarantee of active ingredients (the creams have a concentration of over 30%)')}}</span></li>
			<li><span lang="EN">{{__('Participation in local trade')}}</span></li>
			<li><span lang="EN">{{__('Promotion the work of local companies')}}</span></li>
			<li><span lang="EN">{{__('Safety (the whole range is suitable for people suffering from allergies or skin problems)')}}</span></li>
			<li><span lang="EN">{{__('Quick and visible results')}}</span></li>
			<li><span lang="EN">{{__('Herbalism philosophy: the power of plants at the service of our beauty')}}</span></li>
		</ul>
		<p><strong>&nbsp;</strong></p>
		<p><strong><strong class="font_color">{{__('As a result,you are using real French cosmetics')}}</p>
	</div>
</article>
@endsection