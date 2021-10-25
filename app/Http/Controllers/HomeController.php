<?php

// namespace MicrosoftAzure\Storage\Samples;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Azureproduct;
use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Blob\BlobSharedAccessSignatureHelper;
use MicrosoftAzure\Storage\Blob\Models\CreateBlockBlobOptions;
use MicrosoftAzure\Storage\Common\ServicesBuilder;
use MicrosoftAzure\Storage\Blob\Models\CreateContainerOptions;
use MicrosoftAzure\Storage\Blob\Models\ListBlobsOptions;
use MicrosoftAzure\Storage\Blob\Models\PublicAccessType;
use MicrosoftAzure\Storage\Blob\Models\DeleteBlobOptions;
use MicrosoftAzure\Storage\Blob\Models\CreateBlobOptions;
use MicrosoftAzure\Storage\Blob\Models\GetBlobOptions;
use MicrosoftAzure\Storage\Blob\Models\ContainerACL;
use MicrosoftAzure\Storage\Blob\Models\SetBlobPropertiesOptions;
use MicrosoftAzure\Storage\Blob\Models\ListPageBlobRangesOptions;
use MicrosoftAzure\Storage\Common\Exceptions\ServiceException;
use MicrosoftAzure\Storage\Common\Exceptions\InvalidArgumentTypeException;
use MicrosoftAzure\Storage\Common\Internal\Resources;
use MicrosoftAzure\Storage\Common\Internal\StorageServiceSettings;
use MicrosoftAzure\Storage\Common\Models\Range;
use MicrosoftAzure\Storage\Common\Models\Logging;
use MicrosoftAzure\Storage\Common\Models\Metrics;
use MicrosoftAzure\Storage\Common\Models\RetentionPolicy;
use MicrosoftAzure\Storage\Common\Models\ServiceProperties;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    /* public function index()
    {
        return view('home');
    }*/
    public function index(Request $request)
    // public function index()
    {
        $mod = new Azureproduct();
        $master = $mod;
        $sub1= $mod;
        $sub2= $mod;
        $sub3= $mod;
        $sub4= $mod;
        $manufacturer_id = '';
        $mastercategory_id='';
        $subcategory1_id='';
        $subcategory2_id='';
        $subcategory3_id='';
        $subcategory4_id='';
        $rowcount_id='5';
        $manufacturer_all = $mod->distinct()->get(['Manufacturer']);
        $mastercategory_all = Null;
        $subcategory1_all=NULL;
        $subcategory2_all=NULL;
        $subcategory3_all=NULL;
        $subcategory4_all=NULL;
        if($request->get('rowcount') != ''){
            $rowcount_id=$request->get('rowcount');
        }
        if($request->get('manufacturer') != '') {
            $manufacturer_id = $request->get('manufacturer');
            $mod = $mod->where('Manufacturer', $manufacturer_id);
            // $scrapingdata = $mod->paginate((int)$rowcount_id);

            $mastercategory_all = $master->where('Manufacturer', $manufacturer_id)->distinct()->get(['Master_Category']);
            if($request->get('mastercategory') != '') {
                $mastercategory_id = $request->get('mastercategory');
                $mod = $mod->where('Master_Category', $mastercategory_id);
                // $scrapingdata = $mod->paginate((int)$rowcount_id);

                $subcategory1_all = $sub1->where('Manufacturer', $manufacturer_id)->where('Master_Category', $mastercategory_id)->distinct()->get(['Sub_Category1']);
                if($request->get('subcategory1') != '') {
                    $subcategory1_id = $request->get('subcategory1');
                    $mod = $mod->where('Sub_Category1', $subcategory1_id);
                    // $scrapingdata = $mod->paginate((int)$rowcount_id);

                    $subcategory2_all = $sub2->where('Manufacturer', $manufacturer_id)->where('Master_Category', $mastercategory_id)->where('Sub_Category1', $subcategory1_id)->distinct()->get(['Sub_Category2']);
                    if($request->get('subcategory2') != '') {
                        $subcategory2_id = $request->get('subcategory2');
                        $mod = $mod->where('Sub_Category2', $subcategory2_id);
                        // $scrapingdata = $mod->paginate((int)$rowcount_id);

                        $subcategory3_all = $sub3->where('Manufacturer', $manufacturer_id)->where('Master_Category', $mastercategory_id)->where('Sub_Category1', $subcategory1_id)->where('Sub_Category2', $subcategory2_id)->distinct()->get(['Sub_Category3']);
                        if($request->get('subcategory3') != '') {
                            $subcategory3_id = $request->get('subcategory3');
                            $mod = $mod->where('Sub_Category3', $subcategory3_id);
                            // $scrapingdata = $mod->paginate((int)$rowcount_id);

                            $subcategory4_all = $sub4->where('Manufacturer', $manufacturer_id)->where('Master_Category', $mastercategory_id)->where('Sub_Category1', $subcategory1_id)->where('Sub_Category2', $subcategory2_id)->where('Sub_Category3', $subcategory3_id)->distinct()->get(['Sub_Category4']);
                            if($request->get('subcategory4') != '') {
                                $subcategory4_id = $request->get('subcategory4');
                                $mod = $mod->where('Sub_Category4', $subcategory4_id);
                                // $scrapingdata = $mod->paginate((int)$rowcount_id);
                            }
                        }
                    }
                }
            }
        }
        $scrapingdata = $mod->paginate((int)$rowcount_id);
        // dd($paginatedItems);
        foreach($scrapingdata as $modelItem) {
            $modelItem->Image = self::generateBlobDownloadLinkWithSAS($modelItem->Image);
            $modelItem->CategoryImage = self::generateBlobDownloadLinkWithSAS($modelItem->CategoryImage);
            // dump($modelItem->Image);
        }
        return view('home', compact('scrapingdata','manufacturer_all', 'manufacturer_id','mastercategory_all','mastercategory_id', 'subcategory1_all', 'subcategory1_id', 'subcategory2_all', 'subcategory2_id', 'subcategory3_all', 'subcategory3_id', 'subcategory4_all', 'subcategory4_id', 'rowcount_id'));
    }
    
    public function generateRandomString()
    {
        $characters = 'abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 6; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    // A temporary container created and used through this sample, and finally deleted        
    public function generateBlobDownloadLinkWithSAS($blobname)
    {
        // global $connectionString, $myContainer;
        // return $blobname;
        $connectionString = 'DefaultEndpointsProtocol=https;AccountName=tstblob02;AccountKey=B5KMKFCYj3YUThoxll9a+w58I3LtHg6Y70ULCOu9Po+zeIPr8mnr1UK6fz1Kf10dTCpG3Bri43xtMmxaPOaM4w==;EndpointSuffix=core.windows.net';
        $characters = 'abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 6; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $myContainer = 'scrapingdata';//. $randomString;
        // $blobClient = ServicesBuilder::getInstance()->createBlobService($connectionString);
        // return $connectionString."/".$myContainer;

        $settings = StorageServiceSettings::createFromConnectionString($connectionString);
        $accountName = $settings->getName();
        $accountKey = $settings->getKey();
        //return $accountName.";".$accountKey.";".$myContainer.";".$blobname;

        $helper = new BlobSharedAccessSignatureHelper(
            $accountName,
            $accountKey
        );

        // Refer to following link for full candidate values to construct a service level SAS
        // https://docs.microsoft.com/en-us/rest/api/storageservices/constructing-a-service-sas
        $expiry = gmdate("Y-m-d\TH:i:s\Z", time() + 30000);
        $sas = $helper->generateBlobServiceSharedAccessSignatureToken(
            Resources::RESOURCE_TYPE_BLOB,
            "$myContainer/$blobname",
            'r',                            // Read
            $expiry                         // A valid ISO 8601 format expiry time
            //'2016-01-01T08:30:00Z',       // A valid ISO 8601 format expiry time
            //'0.0.0.0-255.255.255.255'
            //'https,http'
        );
        
        $connectionStringWithSAS = Resources::BLOB_ENDPOINT_NAME .
            '='.
            'https://' .
            $accountName .
            '.' .
            Resources::BLOB_BASE_DNS_NAME .
            ';' .
            Resources::SAS_TOKEN_NAME .
            '=' .
            $sas;
        
        $blobClientWithSAS = BlobRestProxy::createBlobService(
            $connectionStringWithSAS
        );
        // return $blobClientWithSAS->getPsrPrimaryUri();
        // We can download the blob with PHP Client Library
        // downloadBlobSample($blobClientWithSAS);

        // Or generate a temporary readonly download URL link
        $blobUrlWithSAS = sprintf(
            '%s%s?%s',
            (string)$blobClientWithSAS->getPsrPrimaryUri(),
            "$myContainer/$blobname",
            $sas
        );

        // file_put_contents("outputBySAS.txt", fopen($blobUrlWithSAS, 'r'));
        //return "https://tstblob02.blob.core.windows.net/scrapingdata/Gojo/Current/%20GOJO%20%20CXT%20Touch%20Free%20Counter%20Mount%20Dispensing%20System__476561.pdf";

        return $blobUrlWithSAS;
    }
}
