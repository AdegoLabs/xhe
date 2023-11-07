<?php
namespace Xhe;
class XheWebglParams
{
	////////////////////////// WebGL Context Info
        var $VENDOR = "";
        var $RENDERER = "";
        var $VERSION = "";
        var $SHADING_LANGUAGE_VERSION = "";
        var $UNMASKED_VENDOR = "";
        var $UNMASKED_RENDERER = "";

        ////////////////////////// Vertex Shader
        var $MAX_VERTEX_ATTRIBS = "";
        var $MAX_VERTEX_UNIFORM_VECTORS = "";
        var $MAX_VERTEX_TEXTURE_IMAGE_UNITS = "";
        var $MAX_VARYING_VECTORS = "";
        //var $Best Float Precision
        var $MAX_VERTEX_UNIFORM_COMPONENTS = "";
        var $MAX_VERTEX_UNIFORM_BLOCKS = "";
        var $MAX_VERTEX_OUTPUT_COMPONENTS = "";
        var $MAX_VARYING_COMPONENTS = "";

        ////////////////////////// Transform Feedback
        var $MAX_TRANSFORM_FEEDBACK_INTERLEAVED_COMPONENTS = "";
        var $MAX_TRANSFORM_FEEDBACK_SEPARATE_ATTRIBS = "";
        var $MAX_TRANSFORM_FEEDBACK_SEPARATE_COMPONENTS = "";

        ////////////////////////// Rasterizer
        var $ALIASED_LINE_WIDTH_RANGE = "float32array";
        var $ALIASED_POINT_SIZE_RANGE = "float32array";

        ////////////////////////// Fragment Shader
        var $MAX_FRAGMENT_UNIFORM_VECTORS = "";
        var $MAX_TEXTURE_IMAGE_UNITS = "";
        var $MAX_FRAGMENT_UNIFORM_COMPONENTS = "";
        //var $Float/Int Precision
        var $MAX_FRAGMENT_UNIFORM_BLOCKS = "";
        var $MAX_FRAGMENT_INPUT_COMPONENTS = "";
        var $MIN_PROGRAM_TEXEL_OFFSET = "";
        var $MAX_PROGRAM_TEXEL_OFFSET = "";

        ////////////////////////// Framebuffer
        var $MAX_DRAW_BUFFERS = "";
        var $MAX_COLOR_ATTACHMENTS = "";
        var $MAX_SAMPLES = "";
        var $RED_BITS = "";
        var $GREEN_BITS = "";
        var $BLUE_BITS = "";
        var $ALPHA_BITS = "";
        var $DEPTH_BITS = "";
        var $STENCIL_BITS = "";
        var $MAX_RENDERBUFFER_SIZE = "";
        var $MAX_VIEWPORT_DIMS = "";

        ////////////////////////// Textures
        var $MAX_TEXTURE_SIZE = "";
        var $MAX_CUBE_MAP_TEXTURE_SIZE = "";
        var $MAX_COMBINED_TEXTURE_IMAGE_UNITS = "";
        var $MAX_TEXTURE_MAX_ANISOTROPY_EXT = "";
        var $MAX_3D_TEXTURE_SIZE = "";
        var $MAX_ARRAY_TEXTURE_LAYERS = "";
        var $MAX_TEXTURE_LOD_BIAS = "";

        ////////////////////////// Uniform Buffers
        var $MAX_UNIFORM_BUFFER_BINDINGS = "";
        var $MAX_UNIFORM_BLOCK_SIZE = "";
        var $UNIFORM_BUFFER_OFFSET_ALIGNMENT = "";
        var $MAX_COMBINED_UNIFORM_BLOCKS = "";
        var $MAX_COMBINED_VERTEX_UNIFORM_COMPONENTS = "";
        var $MAX_COMBINED_FRAGMENT_UNIFORM_COMPONENTS = "";
};
?>